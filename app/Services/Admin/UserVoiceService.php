<?php

namespace App\Services\Admin;

use App\Contracts\Repositories\UserVoiceRepository;
use App\Models\UserVoice;
use Illuminate\Http\Request;

/**
 * This is class UserVoice Service
 */
class UserVoiceService
{
    /**
     * contructor
     *
     * @param UserVoiceRepository $repository
     * @return void
     */
    public function __construct(
        protected readonly UserVoiceRepository $repository
    ) {
    }

    /**
     * Display a listing of the UserVoice.
     * @param \Illuminate\Http\Request $request
     * @return array<mixed>
     */
    public function index(Request $request): array
    {
        $userVoices = $this->repository->search([
            'comment' => $request->comment
        ]);

        return compact('userVoices');
    }

    /**
     * Delete uservoice
     * @param UserVoice $userVoice
     *
     * @return boolean|null
     */
    public function destroy(UserVoice $userVoice): bool|null
    {
        return $userVoice->delete();
    }

    /**
     * Update Popular uservoice
     *
     * @param UserVoice $userVoice
     * @param int       $isPopular
     *
     * @return bool
     */
    public function updatePopular(UserVoice $userVoice, int $isPopular): bool
    {
        if ($isPopular && $this->repository->getCountPopular() >= UserVoice::MAX_POPULAR) {
            return false;
        }
        $userVoice->is_popular = $isPopular;
        $userVoice->save();

        return true;
    }
}
