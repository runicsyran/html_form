<?php
class Invoice {
    private $conn;
    private $table_name = "invoices";

    public $id;
    public $user_id;
    public $product_id;
    public $amount;
    public $date;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (user_id, product_id, amount, date) VALUES (:user_id, :product_id, :amount, :date)";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':product_id', $this->product_id);
        $stmt->bindParam(':amount', $this->amount);
        $stmt->bindParam(':date', $this->date);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function readByUserId($user_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE user_id = :user_id ORDER BY date DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        return $stmt;
    }

    public function read($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt;
    }
}
?>