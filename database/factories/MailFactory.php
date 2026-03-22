<?php

namespace Database\Factories;

use App\Models\Mail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Mail>
 */
class MailFactory extends Factory
{
    public function definition(): array
    {
        $paragraphs = collect(fake()->paragraphs(rand(2, 4)))
            ->map(fn (string $p): string => '<p>'.e($p).'</p>')
            ->implode('');

        return [
            'name' => fake()->name(),
            'phone' => fake()->optional(0.4)->numerify('###########'),
            'email' => fake()->safeEmail(),
            'subject' => fake()->sentence(rand(3, 8)),
            'body' => $paragraphs,
            'is_read' => fake()->boolean(55),
            'is_important' => fake()->boolean(12),
            'is_sent' => false,
            'smtp_delivered' => false,
            'created_at' => fake()->dateTimeBetween('-45 days', 'now'),
        ];
    }

    /**
     * Mensagem de boas-vindas (demo fixa, como a original do projeto).
     */
    public function welcome(): static
    {
        return $this->state(fn (): array => [
            'name' => 'Warrior Mail',
            'phone' => null,
            'email' => 'test@warriormail.dev',
            'subject' => 'Welcome to Warriorfolio 🚀',
            'body' => '<p>We\'re excited to have you onboard! 🎉 This is a test email from Warriorfolio, making sure everything is working smoothly. ✅</p>'
                .'<p><strong>What\'s new?</strong></p>'
                .'<ul>'
                .'<li>Your personal blog is ready! 📝</li>'
                .'<li>New Mail View Layout. ✨</li>'
                .'<li>Dark mode is now the default. 🌙</li>'
                .'</ul>'
                .'<p>Happy exploring! — Warriorfolio</p>',
            'is_read' => false,
            'is_important' => true,
            'is_sent' => false,
            'smtp_delivered' => false,
            'created_at' => now()->subHours(3),
        ]);
    }

    /** Caixa de entrada (recebida). */
    public function received(): static
    {
        return $this->state(fn (): array => [
            'is_sent' => false,
            'smtp_delivered' => false,
        ]);
    }

    public function unread(): static
    {
        return $this->state(fn (): array => [
            'is_read' => false,
        ]);
    }

    public function read(): static
    {
        return $this->state(fn (): array => [
            'is_read' => true,
        ]);
    }

    public function important(): static
    {
        return $this->state(fn (): array => [
            'is_important' => true,
        ]);
    }

    /** Mensagem enviada a partir do painel (destinatário em name/email). */
    public function sent(): static
    {
        return $this->state(fn (): array => [
            'is_sent' => true,
            'is_read' => true,
            'is_important' => false,
            'smtp_delivered' => fake()->boolean(55),
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'subject' => fake()->randomElement([
                'Follow-up: project update',
                'Invitation — workshop',
                'Your Warriorfolio invoice',
                'Quick question',
                'Newsletter draft preview',
            ]),
            'body' => '<p>'.e(fake()->paragraph()).'</p><p>'.e(fake()->paragraph()).'</p>',
            'created_at' => fake()->dateTimeBetween('-20 days', 'now'),
        ]);
    }
}
