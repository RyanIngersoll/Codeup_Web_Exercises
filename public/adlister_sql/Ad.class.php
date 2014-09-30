<?php
 
class Ad {
 
    public $dbc;
    
    public $id;
 
    public $title = '';
    public $body = '';
    public $contactName = '';
    public $contactEmail = '';
    public $createdAt = '';
 
    public function __construct($dbc, $id = null)
    {
        $this->dbc = $dbc;
        
        if (isset($id)) {
            $this->id = $id;
            
            $selectStmt = $this->dbc->prepare('SELECT * FROM items WHERE id = ?');
            $selectStmt->execute([$this->id]);
            
            $row = $selectStmt->fetch(PDO::FETCH_ASSOC);
        
            $this->title        = $row['title'];
            $this->body         = $row['body'];
            $this->contactName  = $row['name'];
            $this->contactEmail = $row['email'];
            $this->createdAt    = new DateTime($row['created_at']);
        }
    }
    
    public function save()
    {
        if (isset($this->id)) {
            $this->update();
        } else {
            $this->insert();
        }
    }
    
    protected function insert()
    {
        $this->createdAt = new DateTime();
        
        $insertSql = 'INSERT INTO items (title, body, name, email, created_at)
                      VALUES (:title, :body, :name, :email, :created_at)';
        
        $insertStmt = $this->dbc->prepare($insertSql);
        
        $insertStmt->bindValue(':title',      $this->title,                  PDO::PARAM_STR);
        $insertStmt->bindValue(':body',       $this->body,                   PDO::PARAM_STR);
        $insertStmt->bindValue(':name',       $this->contactName,            PDO::PARAM_STR);
        $insertStmt->bindValue(':email',      $this->contactEmail,           PDO::PARAM_STR);
        $insertStmt->bindValue(':created_at', $this->createdAt->format('c'), PDO::PARAM_STR);
        
        $insertStmt->execute();
        
        $this->id = $this->dbc->lastInsertId();
    }
    
    protected function update()
    {
        $updateSql = 'UPDATE items
                      SET title = :title, body = :body, name = :name, email = :email
                      WHERE id = :id';
        
        $updateStmt = $this->dbc->prepare($updateSql);
        
        $updateStmt->bindValue(':title', $this->title,        PDO::PARAM_STR);
        $updateStmt->bindValue(':body',  $this->body,         PDO::PARAM_STR);
        $updateStmt->bindValue(':name',  $this->contactName,  PDO::PARAM_STR);
        $updateStmt->bindValue(':email', $this->contactEmail, PDO::PARAM_STR);
        $updateStmt->bindValue(':id',    $this->id,           PDO::PARAM_INT);
        
        $updateStmt->execute();
    }
}