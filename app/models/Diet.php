<?php
class Diet{
    private $id;
    private $name;
    private $description;
    private $goal;
    private $restrictions;
    private $registerDate;
    private $calories;
    private $protein;
    private $carbohydrates;
    private $facts;
    private $idUser;

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
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of goal
     */
    public function getGoal()
    {
        return $this->goal;
    }

    /**
     * Set the value of goal
     */
    public function setGoal($goal): self
    {
        $this->goal = $goal;

        return $this;
    }

    /**
     * Get the value of restrictions
     */
    public function getRestrictions()
    {
        return $this->restrictions;
    }

    /**
     * Set the value of restrictions
     */
    public function setRestrictions($restrictions): self
    {
        $this->restrictions = $restrictions;

        return $this;
    }

    /**
     * Get the value of registerDate
     */
    public function getRegisterDate()
    {
        return $this->registerDate;
    }

    /**
     * Set the value of registerDate
     */
    public function setRegisterDate($registerDate): self
    {
        $this->registerDate = $registerDate;

        return $this;
    }

    /**
     * Get the value of calories
     */
    public function getCalories()
    {
        return $this->calories;
    }

    /**
     * Set the value of calories
     */
    public function setCalories($calories): self
    {
        $this->calories = $calories;

        return $this;
    }

    /**
     * Get the value of protein
     */
    public function getProtein()
    {
        return $this->protein;
    }

    /**
     * Set the value of protein
     */
    public function setProtein($protein): self
    {
        $this->protein = $protein;

        return $this;
    }

    /**
     * Get the value of carbohydrates
     */
    public function getCarbohydrates()
    {
        return $this->carbohydrates;
    }

    /**
     * Set the value of carbohydrates
     */
    public function setCarbohydrates($carbohydrates): self
    {
        $this->carbohydrates = $carbohydrates;

        return $this;
    }

    /**
     * Get the value of facts
     */
    public function getFacts()
    {
        return $this->facts;
    }

    /**
     * Set the value of facts
     */
    public function setFacts($facts): self
    {
        $this->facts = $facts;

        return $this;
    }

    /**
     * Get the value of idUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     */
    public function setIdUser($idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }
}