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

        if ($search === '' and empty($search)) {
            header("Location: ./index.php?search=empty");
            exit();
        }

        if (strlen(trim($search)) < 3) {
            header("Location: ./index.php?search=search_term_too_small");
            exit();
        }

        $search_query = "SELECT * FROM article WHERE ";
        $search_query .= "article_title LIKE '%$search%' OR ";
        $search_query .= "article_content LIKE '%$search%' OR ";
        $search_query .= "article_author LIKE '%$search%' OR ";
        $search_query .= "article_date LIKE '%$search%' ";
        $search_result = mysqli_query($conn, $search_query);
        $search_listing = mysqli_num_rows($search_result);
        $suffix_checker = ($search_listing !== 1) ? 's' : '';
        $output_result_text = ($search_listing > 0) ? '<h2>Your search for' . " '{$search}'" . ' yielded ' . "$search_listing" . ' result' . "$suffix_checker" . '</h2>' : '';
        echo $output_result_text;
        if ($search_listing > 0) {
            while ($row = mysqli_fetch_assoc($search_result)) {
                $article_id = $row['article_id'];
                $article_title = $row['article_title'];
                $article_content = $row['article_content'];
                $article_date = $row['article_date'];
                $article_author = $row['article_author'];
                ?>
    <div class="article">

        <h3><a href="article.php?title=<?php echo $article_title; ?>&date=<?php echo $article_date; ?>"><?php echo $article_title; ?>
            </a></h3>
        <p><?php echo $article_content; ?></p>
        <p><?php echo $article_date; ?></p>
        <p><?php echo $article_author; ?></p>
    </div>
    <?php
            }
        } else {
            echo <<<END
                <h2>Your search for '$search' returned no result</h2>
                <p>Here are some suggestions below:</p>
                <ul>
                    <li>Make sure all words are spelled correctly</li>
                    <li>Try more general keywords, especially if you are attempting a name</li>
                    <li>Use specific keywords in your search</li>
                    <li>Use a combination of different keywords to improve search listings</li>
                </ul>
                <img src="./giphy.gif" title="Nothing found"/> <br> <br>
                <p><strong>Try again but this time be more specific...</strong></p>
                 <form action="search.php" method="post">
                    <input type="text" name="search" placeholder="e.g. programming">
                    <button type="submit" name="submit-search">Search</button>
                </form>

END;
        }
    }



    ?>
</div>


<?php include_once("./footer.php"); ?>