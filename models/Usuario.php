<?php
class Usuario {
    private $conn;
    private $table = "usuarios";

    public $id;
    public $nombres;
    public $apellidos;
    public $dni;
    public $correo;
    public $telefono;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT id, nombres, apellidos, dni, correo, telefono, fecha FROM $this->table");
        $stmt->execute();
        return $stmt;
    }

    public function getById() {
        $stmt = $this->conn->prepare("SELECT id, nombres, apellidos, dni, correo, telefono, fecha FROM $this->table WHERE id = :id");
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (nombres, apellidos, dni, correo, telefono) VALUES (:nombres, :apellidos, :dni, :correo, :telefono)");
        $stmt->bindParam(":nombres", $this->nombres);
        $stmt->bindParam(":apellidos", $this->apellidos);
        $stmt->bindParam(":dni", $this->dni);
        $stmt->bindParam(":correo", $this->correo);
        $stmt->bindParam(":telefono", $this->telefono);
        return $stmt->execute();
    }

    public function update() {
        $stmt = $this->conn->prepare("UPDATE $this->table SET nombres = :nombres, apellidos = :apellidos, dni = :dni, correo = :correo, telefono = :telefono WHERE id = :id");
        $stmt->bindParam(":nombres", $this->nombres);
        $stmt->bindParam(":apellidos", $this->apellidos);
        $stmt->bindParam(":dni", $this->dni);
        $stmt->bindParam(":correo", $this->correo);
        $stmt->bindParam(":telefono", $this->telefono);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

    public function delete() {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id = :id");
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }
}
