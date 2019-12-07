<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Floor;
use App\Entity\Suite;
use App\Entity\SuiteUser;
use App\Entity\Status;

class Access {

    /**
     *
     * @var EntityManagerInterface 
     */
    private $em;

    /**
     * 
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function get() {     
        $suiteAccess = [];
        
        $floors = $this->em
                ->getRepository(Floor::class)
                ->findAll();
        if ($floors) {
            foreach ($floors as $floor) {
                /* @var Floor $floor */
                $suiteAccess[] = [
                    "level" => $floor->getLevel(),
                    "suites" => $this->getSuites($floor)
                ];
            }
        }
        
        return [
            'total' => count($suiteAccess),
            'entity' => $suiteAccess,
        ];
    }

    private function getSuites(Floor $floor) {
        $result = [];
        $suites = $floor->getSuites();
        if ($suites) {
            foreach ($suites as $suite) {
                /* @var Suite $suite */
                $result[] = [
                    "suiteNumber" => $suite->getSuiteNumber(),
                    "active" => $this->getUsersCount($suite->getId(), Status::ACTIVE),
                    "notActive" => $this->getUsersCount($suite->getId(), Status::NOT_ACTIVE),
                    "invited" => $this->getUsersCount($suite->getId(), Status::INVITED)                    
                ];
            }
        }
        return $result;
    }

    /**
     * 
     * @param int $suiteId
     * @param int $statusId
     * @return int
     */
    private function getUsersCount(int $suiteId, int $statusId) {
        $repository = $this->em->getRepository(SuiteUser::class);
        $qb = $repository->createQueryBuilder('su')
                ->leftJoin('su.user', 'u')
                ->where('su.suite = :suiteId')
                ->andWhere('u.status = :statusId')
                ->setParameter('suiteId', $suiteId)
                ->setParameter('statusId', $statusId);
        $query = $qb->getQuery();

        return count($query->getResult());
    }

}
