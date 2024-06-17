<?php
class Recipe{
    private $id;
    private $title;
    private $description;
    private $ingredients;
    private $prepTime;
    private $cookTime;
    private $difficulty;
    private $recipePhoto;
    private $registerDate;
    private $created_by;
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
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle($title): self
    {
        $this->title = $title;

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
     * Get the value of ingredients
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * Set the value of ingredients
     */
    public function setIngredients($ingredients): self
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    /**
     * Get the value of prepTime
     */
    public function getPrepTime()
    {
        return $this->prepTime;
    }

    /**
     * Set the value of prepTime
     */
    public function setPrepTime($prepTime): self
    {
        $this->prepTime = $prepTime;

        return $this;
    }

    /**
     * Get the value of cookTime
     */
    public function getCookTime()
    {
        return $this->cookTime;
    }

    /**
     * Set the value of cookTime
     */
    public function setCookTime($cookTime): self
    {
        $this->cookTime = $cookTime;

        return $this;
    }

    /**
     * Get the value of difficulty
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * Set the value of difficulty
     */
    public function setDifficulty($difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    /**
     * Get the value of recipePhoto
     */
    public function getRecipePhoto()
    {
        return $this->recipePhoto;
    }

    /**
     * Set the value of recipePhoto
     */
    public function setRecipePhoto($recipePhoto): self
    {
        $this->recipePhoto = $recipePhoto;

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

    public function getCreatedBy() {
        return $this->created_by;
    }

    public function setCreatedBy($created_by): self
    {
        $this->created_by = $created_by;

        return $this;
    }

    public function isCreatedByUser($idUser) {
        return $this->created_by == $idUser;
    }
}