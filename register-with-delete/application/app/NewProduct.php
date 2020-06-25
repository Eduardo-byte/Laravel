<?php
namespace App;

    class NewProduct{
        private $id;
        private $name;
        private $stock;
        private $price;
        private $categorieName;
        private $categorieWarehouse;
        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id): void
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name): void
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getStock()
        {
            return $this->stock;
        }

        /**
         * @param mixed $stock
         */
        public function setStock($stock): void
        {
            $this->stock = $stock;
        }

        /**
         * @return mixed
         */
        public function getPrice()
        {
            return $this->price;
        }

        /**
         * @param mixed $price
         */
        public function setPrice($price): void
        {
            $this->price = $price;
        }

        /**
         * @return mixed
         */
        public function getCategorieName()
        {
            return $this->categorieName;
        }

        /**
         * @param mixed $categorieName
         */
        public function setCategorieName($categorieName): void
        {
            $this->categorieName = $categorieName;
        }

        public function getCategorieWarehouse(){
            return  $this->categorieWarehouse;
        }

        /**
         * @param mixed $categorieWarehouse
         */
        public function setCategorieWarehouse($categorieWarehouse): void
        {
            $this->categorieWarehouse = $categorieWarehouse;
        }

    }
