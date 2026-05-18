<?php

class Validator
{
    private array $errors = [];

    private const ALLOWED_STATUSES = ['disponible', 'emprunte', 'maintenance'];

    public function validate(array $data): void
    {
        $this->errors = [];

        if (trim($data['title'] ?? '') === '') {
            $this->errors[] = 'Le titre est obligatoire.';
        }

        if (trim($data['type'] ?? '') === '') {
            $this->errors[] = 'Le type est obligatoire.';
        }

        if (!in_array($data['status'] ?? '', self::ALLOWED_STATUSES, true)) {
            $this->errors[] = 'Le statut est invalide.';
        }
    }
    public function isValid(): bool
    {
        return empty($this->errors);
    }
    public function getErrors(): array
    {
        return $this->errors;
    }
}
