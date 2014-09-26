<ol><?foreach($todo_list as $entry): ?>
                    
                    	<li><h4><button class="remove-button" data-entry-id="<?= $entry['id']; ?>">Remove</button><?= " rank: " . " " . $entry['priority'] . " " . $entry['name']?></h4></li>
                      
                  <? endforeach; ?> 

 <form action="todo_list_sql.php" method="post" id="remove-form">
              <input type="hidden" name="remove-entry" id="remove-entry" />
</form>