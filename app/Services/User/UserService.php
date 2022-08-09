<?php

namespace App\Services\User;

use App\Contracts\Repositories\CityRepository;
use App\Contracts\Repositories\PrefectureRepository;
use App\Contracts\Repositories\UserRepository;
use App\Models\User;

/**
 * This is class User Service
 */
class UserService
{
    /**
     * contructor
     *
     * @param \App\Contracts\Repositories\CityRepository       $cityRepository
     * @param \App\Contracts\Repositories\PrefectureRepository $prefectureRepository
     * @param \App\Contracts\Repositories\UserRepository       $repository
     * @return void
     */
    public function __construct(
        protected readonly UserRepository $repository,
        protected readonly PrefectureRepository $prefectureRepository,
        protected readonly CityRepository $cityRepository,
    ) {
    }

    /**
     * getUserByEmail User
     *
     * @param string $email
     *
     * @return User|null
     */
    public function getUserByEmail(string $email): User|null
    {
        /** @var User $user */
        $user = $this->repository->getUserByEmail($email);

        return $user;
    }

    /**
     * updatePassword User
     *
     * @param array  $dataRequest
     * @param string $email
     *
     * @return mixed
     */
    public function updatePassword(array $dataRequest, string $email): mixed
    {
        $user = $this->repository->updatePassword($dataRequest, $email);

        return $user;
    }

    /**
     * getPrefectures
     *
     * @return array
     */
    public function getPrefectures(): array
    {
        return $this->prefectureRepository->getPrefectures();
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function suggestCities(int $id): array
    {
        return $this->cityRepository->suggestCities($id);
    }
}
