<?php
declare(strict_types=1);

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\UploadedFile;

class FileType implements Rule
{
    public function __construct(protected array $acceptedTypes)
    {
    }

    /**
     * @param $attribute
     * @param UploadedFile $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        try {
            $mimeType = $value->getMimeType();
            preg_match('/^(.*)\//', $mimeType, $res);
            $type = $res[1];

            return in_array($type, $this->acceptedTypes);
        } catch (\Throwable) {
            return false;
        }
    }
    public function message(): string
    {
        $types = implode(', ', $this->acceptedTypes);
        return 'File type invalid, accepted types: ' . $types;
    }
}