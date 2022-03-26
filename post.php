<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Post Box</title>
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- FontAweome CDN Link for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
  <div class="container">
    <div class="wrapper">
      <section class="post">
        <header>Create Post</header>
        <form method=get action=community_post_result.php>
          <div class="content">
            <img src="icons/logo.png" alt="logo">
            <div class="details">
              <input type=text name=name>
            </div>
          </div>
          <textarea placeholder="Question Topic" spellcheck="false" required name=topic></textarea>
          <textarea placeholder="What's on your mind?" spellcheck="false" required name=question ></textarea>
          <button>Post </button>
        </form>
      </section>
    </div>
  </div>

  <script>
    const container = document.querySelector(".container"),
      privacy = container.querySelector(".post .privacy"),
      arrowBack = container.querySelector(".audience .arrow-back");

    privacy.addEventListener("click", () => {
      container.classList.add("active");
    });

    arrowBack.addEventListener("click", () => {
      container.classList.remove("active");
    });
  </script>

</body>

</html>