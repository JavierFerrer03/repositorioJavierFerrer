<?php
class Session{
    private $id;
    private $type;
    private $description;
    private $sessionPhoto;
    private $idTraining;

    /**
     * Get the value of id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Set the value of type
     */
    public function setType($type): self {
        $this->type = $type;
        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription($description): self {
        $this->description = $description;
        return $this;
    }

    /**
     * Get the value of idTraining
     */
    public function getIdTraining() {
        return $this->idTraining;
    }

    /**
     * Set the value of idTraining
     */
    public function setIdTraining($idTraining): self {
        $this->idTraining = $idTraining;
        return $this;
    }

    /**
     * Get the value of sessionPhoto
     */
    public function getSessionPhoto()
    {
        return $this->sessionPhoto;
    }

    /**
     * Set the value of sessionPhoto
     */
    public function setSessionPhoto($sessionPhoto): self
    {
        $this->sessionPhoto = $sessionPhoto;

        return $this;
    }
}