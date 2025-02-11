<?php
class InvoiceController {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getInvoicesByUserId($userId) {
        $query = "SELECT * FROM invoices WHERE user_id = :user_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getInvoiceDetails($invoiceId) {
        $query = "SELECT * FROM invoices WHERE id = :invoice_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':invoice_id', $invoiceId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createInvoice($userId, $amount, $description) {
        $query = "INSERT INTO invoices (user_id, amount, description, created_at) VALUES (:user_id, :amount, :description, NOW())";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':description', $description);
        return $stmt->execute();
    }
}
?>