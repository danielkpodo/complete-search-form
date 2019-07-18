<?php include_once("./header.php"); ?>

<div class="article-container">
    <h1>Search Page</h1>
    <?php
    if (isset($_POST['submit-search'])) {
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        function protect_input($data)
        { //protection from hackers!!!
            $data = filter_var($data, FILTER_SANITIZE_STRING);
            $data = filter_var($data, FILTER_SANITIZE_MAGIC_QUOTES);
            $data = trim($data);
            return $data;
        }
        $search = protect_input($search);
        //check some validations here!


        $search_query = "SELECT * FROM article WHERE ";
        $search_query .= "article_title LIKE '%$search%' OR ";
        $search_query .= "article_content LIKE '%$search%' OR ";
        $search_query .= "article_author LIKE '%$search%' OR ";
        $search_query .= "article_date LIKE '%$search%' ";
        $search_result = mysqli_query($conn, $search_query);
        if (!$search_result) { //sql error checker
            die("Database query failed: " . mysqli_error($conn));
        }
        $search_listing = mysqli_num_rows($search_result);
        if ($search_listing > 0) {
            while ($row = mysqli_fetch_assoc($search_result)) {
                $article_id = $row['article_id'];
                $article_title = $row['article_title'];
                $article_content = $row['article_content'];
                $article_date = $row['article_date'];
                $article_author = $row['article_author'];
                ?>
    <div class="article">
        <h3><?php echo $article_title; ?></h3>
        <p><?php echo $article_content; ?></p>
        <p><?php echo $article_date; ?></p>
        <p><?php echo $article_author; ?></p>
    </div>
    <?php
            } //end of while loop
        } else {
            echo "<h2>There are no results matching your search!</h2>";
        }
    }




    ?>
</div>

<?php include_once("./footer.php"); ?>