<?php include "./db.php"; ?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Photo Gallery</title>
   <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body>
   <div class="container m-auto">
      <!-- Photo Uploading Section Start -->
      <div>
         <h1 class="text-3xl text-center pb-4 pt-4">Photo Gallery</h1>
         <form action="upload.php" method="POST" enctype="multipart/form-data"
            class="max-w-md mx-auto p-4 space-y-4 bg-gray-100 rounded shadow-md">

            <input
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
               type="text" name="title" placeholder="Photo title" required>

            <input
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
               type="file" name="image" accept="image/*" required>

            <button type="submit"
               class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Upload</button>
         </form>
      </div>

      <div>
         <?php
             $result = $conn->query(
                 "SELECT * FROM photos ORDER BY created_at DESC"
             );
             if ($result->num_rows > 0):
                 while ($row = $result->fetch_assoc()):
             ?>
         <div class=" flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96 m-auto text-center justify-center >
		<h6 class=" mb-2 text-slate-800 text-xl font-semibold">
            <?php echo $row["title"]; ?>
            </h6>
            <img src="<?php echo $row["image_path"]; ?>" alt="card-image"
               class=" m-2.5 w-82 overflow-hidden rounded-md pb-4 align-center" />
            <form action="delete.php" method="POST">
               <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
               <button
                  class="w-32 bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                  type="submit">Delete</button>
            </form>
         </div>

      </div>


      <?php endwhile;
              else:
                  echo "No Photos uploaded yet!";
              endif;
          ?>
   </div>

</body>

</html>