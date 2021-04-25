    <?php
                                    $mysql = new mysqli('localhost', 'root', 'root', 'se');
                                    $sql="SELECT `category`, COUNT(DISTINCT(`product_name`)) AS 'n' FROM `books` GROUP by `category`";
                                    $result = $mysql->query($sql);

                                    while($row=$result->fetch_assoc()){ ?>
                                        <div class="list-group-item checkbox  ">
                                            <label>
                                                <input type="checkbox" class="product_check brand" value="<?php echo $row['category']; ?>">
                                                <?php echo $row['category']; ?>
                                                <small>( <?php echo $row['n']; ?> )</small>
                                            </label>
                                        </div>
                                <?php
                                    }
                                ?>