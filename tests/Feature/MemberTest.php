<?php

use App\Models\Members;
use App\Models\User;
use App\Services\StatisticsService;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create([
        'role' => 'admin'
    ]);
});

test('can list members', function () {
    Members::factory()->count(3)->create();

    $response = $this->actingAs($this->user)
        ->get(route('members.index'));

    $response->assertStatus(200);
    $response->assertViewHas('members');
});

test('can create a member and calculates age correctly', function () {
    $memberData = [
        'fullname' => 'John Doe',
        'document_id' => '12345678',
        'birth_date' => '1990-01-01',
        'phone' => '3001234567',
        'gender' => 'masculino',
        'marital_status' => 'soltero',
        'ministry' => 'alabanza',
        'church_role' => 'miembro',
        'join_date' => now()->format('Y-m-d'),
        'status' => 'activo',
    ];

    $response = $this->actingAs($this->user)
        ->post(route('members.store'), $memberData);

    $response->assertRedirect(route('members.index'));
    
    $member = Members::where('document_id', '12345678')->first();
    expect($member)->not->toBeNull();
    expect($member->age)->toBe(36); // Assuming current year is 2026 as per system prompt
    expect($member->age_range)->toBe('adultos');
});

test('validates unique document_id', function () {
    Members::factory()->create(['document_id' => 'DUPLICATE']);

    $memberData = [
        'fullname' => 'Another Name',
        'document_id' => 'DUPLICATE',
        'birth_date' => '1990-01-01',
        'phone' => '3001234567',
        'gender' => 'masculino',
        'marital_status' => 'casado',
        'ministry' => 'ninguno',
        'church_role' => 'visitante',
        'join_date' => now()->format('Y-m-d'),
    ];

    $response = $this->actingAs($this->user)
        ->post(route('members.store'), $memberData);

    $response->assertSessionHasErrors('document_id');
});

test('statistics service returns correct calculations', function () {
    // Create specific members for stats
    Members::factory()->create(['status' => 'activo', 'is_baptized' => true, 'is_sealed' => true, 'birth_date' => '2020-01-01']); // Niños
    Members::factory()->create(['status' => 'activo', 'is_baptized' => false, 'is_sealed' => false, 'birth_date' => '2010-01-01']); // Jóvenes
    Members::factory()->create(['status' => 'inactivo', 'is_baptized' => true, 'is_sealed' => false, 'birth_date' => '1980-01-01']); // Adultos

    $service = new StatisticsService();
    $stats = $service->getAllStatistics();

    expect($stats['total'])->toBe(3);
    expect($stats['active'])->toBe(2);
    expect($stats['inactive'])->toBe(1);
    expect($stats['baptized'])->toBe(2);
    expect($stats['sealed'])->toBe(1);
    expect($stats['by_age_range']['niños'])->toBe(1);
    expect($stats['by_age_range']['jóvenes'])->toBe(1);
    expect($stats['by_age_range']['adultos'])->toBe(1);
    
    expect($stats['activity_rate'])->toBe(66.67);
});
