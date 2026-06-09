<?php

namespace Tests\Feature;

use App\Models\Score;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_scores_page_shows_student_score_progress(): void
    {
        $user = User::factory()->create();
        $student = Student::factory()->create(['name' => 'Budi']);
        $ipa = Subject::query()->create(['name' => 'IPA']);
        Subject::query()->create(['name' => 'IPS']);

        Score::query()->create([
            'student_id' => $student->id,
            'subject_id' => $ipa->id,
            'score' => 80,
        ]);

        $response = $this->actingAs($user)->get(route('score.list'));

        $response->assertOk();
        $response->assertSee('Budi');
        $response->assertSee('1/2');
    }

    public function test_user_can_update_student_score(): void
    {
        $user = User::factory()->create();
        $student = Student::factory()->create();
        $subject = Subject::query()->create(['name' => 'IPA']);

        $response = $this->actingAs($user)->post(route('score.update.data', [
            'studentId' => $student->id,
            'subjectId' => $subject->id,
        ]), [
            'subject_id' => $subject->id,
            'score' => 95,
        ]);

        $response->assertRedirect(route('score.input.view', ['studentId' => $student->id]));
        $this->assertDatabaseHas('scores', [
            'student_id' => $student->id,
            'subject_id' => $subject->id,
            'score' => 95,
        ]);
    }
}
