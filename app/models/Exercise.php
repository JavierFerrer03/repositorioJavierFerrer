<?php
class Exercise{
    private $id;
    private $name;
    private $description;
    private $repetitions;
    private $series;
    private $exercisePhoto;
    private $idUser;
    private $idSession;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of id
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of id
     */
    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getRepetitions()
    {
        return $this->repetitions;
    }

    /**
     * Set the value of id
     */
    public function setRepetitions($repetitions): self
    {
        $this->repetitions = $repetitions;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Set the value of id
     */
    public function setSeries($series): self
    {
        $this->series = $series;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getExercisePhoto()
    {
        return $this->exercisePhoto;
    }

    /**
     * Set the value of id
     */
    public function setExercisePhoto($exercisePhoto): self
    {
        $this->exercisePhoto = $exercisePhoto;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of id
     */
    public function setIdUser($idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getIdSession()
    {
        return $this->idSession;
    }

    /**
     * Set the value of id
     */
    public function setIdSession($idSession): self
    {
        $this->idSession = $idSession;

        return $this;
    }
}