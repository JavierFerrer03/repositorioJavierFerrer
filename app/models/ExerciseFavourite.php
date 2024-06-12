<?php
class ExerciseFavourite{
    private $id;
    private $idExercise;
    private $idUser;

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
     * Get the value of id
     */
    public function getIdExercise() {
        return $this->idExercise;
    }

    /**
     * Set the value of id
     */
    public function setIdExercise($idExercise): self {
        $this->idExercise = $idExercise;
        return $this;
    }

    /**
     * Get the value of id
     */
    public function getIdUser() {
        return $this->idUser;
    }

    /**
     * Set the value of id
     */
    public function setIdUser($idUser): self {
        $this->idUser = $idUser;
        return $this;
    }
}