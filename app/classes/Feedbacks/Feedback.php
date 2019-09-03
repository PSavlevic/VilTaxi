<?php

namespace App\Feedbacks;

class Feedback
{

    private $data = [];

    public function __construct($data = null)
    {
        if ($data) {
            $this->setData($data);
        } else {
            $this->data = [
                'id' => null,
                'name' => null,
                'feedback' => null,
                'date' => null,
            ];
        }
    }

    /**
     * * Sets all data from array
     * @param $array
     */
    public function setData($array)
    {
        if (isset($array['id'])) {
            $this->setId($array['id']);
        } else {
            $this->data['id'] = null;
        }
        $this->setName($array['name'] ?? null);
        $this->setFeedback($array['feedback'] ?? null);
        $this->setDate($array['date'] ?? null);
    }

    /**
     * Gets all data as array
     * @return array
     */
    public function getData()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'feedback' => $this->getFeedback(),
            'date' => $this->getDate(),
        ];
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->data['id'] = $id;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->data['id'];
    }

    /**
     * Sets name
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->data['name'] = $name;
    }

    /**
     * Returns name
     * @return string
     */
    public function getName()
    {
        return $this->data['name'];
    }

    /**
     * Sets data feedback
     * @param string $feedback
     */
    public function setFeedback(string $feedback)
    {
        $this->data['feedback'] = $feedback;
    }

    /**
     * @return mixed
     */
    public function getFeedback()
    {
        return $this->data['feedback'];
    }


    /**
     * Sets Date
     * @param string $date
     */
    public function setDate(string $date)
    {
        $this->data['date'] = $date;
    }

    /**
     * Returns date
     * @return string
     */
    public function getDate()
    {
        return $this->data['date'];
    }
}
