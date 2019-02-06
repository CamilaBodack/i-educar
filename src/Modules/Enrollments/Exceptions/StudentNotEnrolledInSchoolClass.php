<?php

namespace iEducar\Modules\Enrollments\Exceptions;

use iEducar\Support\Exceptions\Error;
use iEducar\Support\Exceptions\Exception;

class StudentNotEnrolledInSchoolClass extends Exception
{
    /**
     * @var int
     */
    protected $enrollmentCode;

    /**
     * @param int $enrollmentCode
     */
    public function __construct($enrollmentCode)
    {
        parent::__construct(
            "Aluno não enturmado.", Error::STUDENT_NOT_ENROLLED_IN_SCHOOL_CLASS
        );

        $this->enrollmentCode = $enrollmentCode;
    }

    /**
     * Return more information about error.
     *
     * @return array
     */
    public function getExtraInfo()
    {
        return [
            'enrollment_code' => $this->enrollmentCode,
        ];
    }
}