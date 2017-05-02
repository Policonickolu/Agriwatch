<?php

namespace Agriwatch\DAO;

use Agriwatch\Domain\Cooltainer;

class CooltainerDAO extends DAO
{

    /**
     * Return a list of all cooltainers
     *
     * @return array A list of all cooltainers.
     */
    public function findAll() {
        $sql = "select * from cooltainer";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convert query result to an array of domain objects
        $cooltainers = array();
        foreach ($result as $row) {
            $cooltainerId = $row['id'];
            $cooltainers[$cooltainerId] = $this->buildDomainObject($row);
        }
        return $cooltainers;
    }

    /**
     * Returns a cooltainer matching the supplied id.
     *
     * @param integer $id
     *
     * @return \Agriwatch\Domain\Cooltainer
     */
    public function find($id) {
        
        $sql = "select * from cooltainer where id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));
        if ($row)
            return $this->buildDomainObject($row);

    }


    /**
     * Create a cooltainer into the database.
     *
     * @param \Agriwatch\Domain\Cooltainer $cooltainer The cooltainer to create
     */
    public function save(Cooltainer $cooltainer) {

        $cooltainerData = array(
            'reference' => $cooltainer->getReference(),
            'address' => $cooltainer->getAddress(),
            'latitude' => $cooltainer->getLatitude(),
            'longitude' => $cooltainer->getLongitude(),
            'temperature' => $cooltainer->getTemperature(),
            'humidity' => $cooltainer->getHumidity(),
            'bees_box_open' => $cooltainer->isBeesBoxOpen()
        );

        $response = "";

        if($cooltainer->getId()){
            $response = $this->getDb()->update('cooltainer', $cooltainerData, array('id' => $cooltainer->getId()));
        }else{

            foreach($cooltainerData as $data){
                if($data === null){
                    return 0;
                }
            }

            $response = $this->getDb()->insert('cooltainer', $cooltainerData);
            $id = $this->getDb()->lastInsertId();
            $cooltainer->setId($id);
        }
        return $response;
    }


    /**
     * Creates an Cooltainer object based on a DB row.
     *
     * @param array $row The DB row containing Cooltainer data.
     * @return \Agriwatch\Domain\Cooltainer
     */
    protected function buildDomainObject(array $row) {
        $cooltainer = new Cooltainer();
        $cooltainer->setId($row['id']);
        $cooltainer->setReference($row['reference']);
        $cooltainer->setAddress($row['address']);
        $cooltainer->setLatitude($row['latitude']);
        $cooltainer->setLongitude($row['longitude']);
        $cooltainer->setTemperature($row['temperature']);
        $cooltainer->setHumidity($row['humidity']);
        $cooltainer->setIsBeesBoxOpen($row['bees_box_open']);
        return $cooltainer;
    }

}