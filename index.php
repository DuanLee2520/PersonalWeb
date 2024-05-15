<!DOCTYPE html>
<html lang="en">
<?php
// MySQL 
echo 'dfadfadfadfadfa';
$servername = "localhost";  // MySQL 服务器地址
$username = "root";      // MySQL 用户名
$password = "liduan1988";      // MySQL 密码
$database = "frankpage";      // 要连接的数据库名
try {
  // 创建连接
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  
  // 设置 PDO 错误模式为异常
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  echo "连接成功";
} catch(PDOException $e) {
  echo "连接失败: " . $e->getMessage();
}



// 创建新表的 SQL 查询语句
              // $sql = "CREATE TABLE IF NOT EXISTS LayOut (
              //   Title VARCHAR(255),
              //   My_Quotes TEXT,
              //   Home VARCHAR(255),
              //   About VARCHAR(255),
              //   Research_Interests VARCHAR(255),
              //   Experience VARCHAR(255),
              //   Publications VARCHAR(255),
              //   Resume VARCHAR(255),
              //   Contact VARCHAR(255),
              //   Others VARCHAR(255),
              //   Path_to_Img_About VARCHAR(255),
              //   Introduction MEDIUMTEXT,
              //   Birthday VARCHAR(255),
              //   Birthday_values VARCHAR(855),
              //   Phone VARCHAR(255),
              //   Phone_values VARCHAR(255),
              //   Address VARCHAR(255),
              //   Address_values VARCHAR(655),
              //   Email VARCHAR(255),
              //   Email_values VARCHAR(555),
              //   update_time TIMESTAMP
              // )";

              // // 执行 SQL 查询
              // if ($conn->query($sql) === TRUE) {
              //   echo "Table created successfully";
              // } else {
              //   echo "Error creating table: " . $conn->error;
              // }
      // 这是设置自动更新  修改时间的trigger
// $sql_trigger = "CREATE TRIGGER update_timestamp
// BEFORE INSERT ON LayOut
// FOR EACH ROW
// BEGIN
//     SET NEW.update_time = CURRENT_TIMESTAMP;
// END;
// ";

// if ($conn->query($sql_trigger) === TRUE) {
//     echo "Trigger created successfully";
// } else {
//     echo "Error creating trigger: " . $conn->error;
// }

// // 关闭数据库连接
// $conn->close();
$stmt = $conn->prepare("SELECT * FROM layout");
$stmt->execute();
// 获取查询结果
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if(empty($result)){
 //如果是空值，就直接赋值为column的name
  for ($i = 0; $i < $stmt->columnCount(); $i++) {
      $meta = $stmt->getColumnMeta($i);
      $name=$meta['name'];
      $$name=$meta['name'];    
        
  }    
}else{
  foreach ($result as $column => $value) {
    // 将每个键值对转换为PHP变量
    if ($value !== null || $value !== '') {
      // 如果$value不为空，则赋值为$value
      $$column = $value;
    } else {
      // 如果$value为空，则赋值为当前列名$column
      $$column = $column;
      echo $column;
    }
  }
}

// exit;
?>
<head>
 
  <link rel="icon" type="image/png" href="/favicon.png"/>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Frank Page</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- ======= Header ======= -->
  <header id="header" class="header-tops">

    <div class="container">
      <h1><a href="index.php"><?php echo $Title ?></a></h1>
      <h2 style="color:#fff"><?php echo $My_Quotes ?></span></h2>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#header"> <span><?php echo $Home ?></span></a></li>
          <li><a href="#about"><span><?php echo $About ?></span></a></li>
          <li><a href="#education"> <span><?php echo $Research_Interests ?></span></a></li>
          <li><a href="#experience"> <span><?php echo $Experience ?></span></a></li>
          <li><a href="#portfolio"> <span><?php echo $Publications ?></span></a></li>          
          <li><a href="https://drive.google.com/file/d/1pT-Nk6AxY9ZOWBizuDb4htA3IiUF_fSe/view?usp=sharing" target="_blank"> <span><?php echo $Resume ?></span></a></li>
          <!-- <li><a href="#links"> <span>Resume & Links</span></a></li> -->
          <li><a href="#contacts"> <span><?php echo $Contact ?></span></a></li>
          <li><a href="#skills"> <span><?php echo $Others ?></span></a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <div class="social-links">
          <a href="https://www.linkedin.com/in/rajaprerak" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          <a href="https://www.github.com/rajaprerak" target="_blank" class="github"><i class="bx bxl-github"></i></a>
          <a href="mailto:rajaprerak@gmail.com" target="_blank" class="google"><i class="bx bxl-google"></i></a>

      </div>

    </div>
  </header><!-- End Header -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">

    <!-- ======= About Me ======= -->
    <div class="about-me container">

      <div class="section-title">
        <h2><?php echo $About ?></h2>
      </div>

      <div class="row">
        <div class="col-lg-4" data-aos="fade-right">
          <img src="assets/img/profile.jpeg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <p><?php echo $Introduction ?>
          </p>
          <div class="row">
            <div class="col-lg-6">
              <ul>
                <li><i class="icofont-rounded-right"></i> <strong>Birthday:</strong> 12 October 1996</li>
                <li><i class="icofont-rounded-right"></i> <strong>Phone:</strong> +1 480-401-8112</li>
              </ul>
            </div>
            <div class="col-lg-6">
              <ul>
                <li><i class="icofont-rounded-right"></i> <strong>Address:</strong> Tempe, AZ</li>
                <li><i class="icofont-rounded-right"></i> <strong>Email:</strong> rajaprerak@gmail.com</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div><!-- End About Me -->

    <!-- ======= Interests ======= -->
    <!-- <div class="interests container">

      <div class="section-title">
        <h2>Interests</h2>
      </div>

      <div class="row">
        <div class="col-lg-3 col-md-4">
          <div class="icon-box">
            <i class="ri-global-line" style="color: #ffbb2c;"></i>
            <h3>Software Development</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="ri-database-2-line" style="color: #5578ff;"></i>
            <h3>Machine Learning</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="ri-camera-3-line" style="color: #e80368;"></i>
            <h3>Computer Vision</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
          <div class="icon-box">
            <i class="ri-english-input" style="color: #1c7d32;"></i>
            <h3>Natural Language Processing</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-code-s-slash-fill" style="color: #28a745;"></i>
            <h3>Software Engineering</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-bar-chart-box-line" style="color: #f1081f;"></i>
            <h3>Visualization</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-file-list-3-line" style="color: #47aeff;"></i>
            <h3>Algorithms</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-image-line" style="color: #ffc107;"></i>
            <h3>Image Processing</h3>
          </div>
        </div>
      </div>

    </div>End Interests -->
  </section><!-- End About Section -->

  <!-- ======= Research Interests ======= -->
  <section id="education" class="services">
    <div class="container">
      <div class="section-title">
        <h2>Research Interests</h2>
      </div>
      <!-- ======= Interests ======= -->
     <div class="interests container">


      <div class="row">
        <div class="col-lg-3 col-md-4">
          <div class="icon-box">
            <i class="ri-global-line" style="color: #ffbb2c;"></i>
            <h3>Software Development</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="ri-database-2-line" style="color: #5578ff;"></i>
            <h3>Machine Learning</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="ri-camera-3-line" style="color: #e80368;"></i>
            <h3>Computer Vision</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
          <div class="icon-box">
            <i class="ri-english-input" style="color: #1c7d32;"></i>
            <h3>Natural Language Processing</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-code-s-slash-fill" style="color: #28a745;"></i>
            <h3>Software Engineering</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-bar-chart-box-line" style="color: #f1081f;"></i>
            <h3>Visualization</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-file-list-3-line" style="color: #47aeff;"></i>
            <h3>Algorithms</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-image-line" style="color: #ffc107;"></i>
            <h3>Image Processing</h3>
          </div>
        </div>
      </div>
<!-- ======= end Interests ======= -->
    </div>
    </div>

  </section>
  <!-- End Education Section -->



  <!-- Start Experience Section -->

  <section id="experience" class="services">
    <div class="container">
      <div class="section-title">
        <h2>Experience</h2>
      </div>
      <div class="row">
          <div class="col-lg-12" data-aos="fade-up">
              <div class="col-md-12 mt-4 mt-md-0 icon-box" data-aos="fade-up" data-aos-delay="100">
                <h4 style="text-align:left;"><a href="https://www.asu.edu/" style="color:#12d640">Arizona State University</a><br> </h4>
                <h5 style="text-align:left;">January 2021 - Present</h5>
                <p style="text-align:left;color:#fff"><em>Software Engineer </em></p>
                <ul style="text-align:left;">
                  <li>Managed large‑scale deployment of JupyterHub with Nbgrader and webwork software, facilitating approx 5500 students.</li>
                  <li>Configured, troubleshot, and administered server‑side web applications for the statistics department.</li>
                  <li>Handled Linux server administration and Apache configuration; automated tasks like user account creation, managing student database, and system maintenance using Shell and automation scripts, reducing manual work by 200%.</li>
                </ul>
              </div>
              <div class="col-md-12 mt-4 mt-md-0 icon-box" data-aos="fade-up" data-aos-delay="100">
                <h4 style="text-align:left;"><a href="https://www.augmenify.com/" style="color:#12d640">Augmenify Infotech Pvt. Ltd.</a><br> </h4>
                <h5 style="text-align:left;">August 2020 - November 2020</h5>
                <p style="text-align:left;color:#fff"><em>Backend Developer</em></p>
                <ul style="text-align:left;">
                  <li>Documented and coded server‑less web application for the hotel industry and designed REST API using Flask‑based JWT authentication.</li>
                  <li>Redeveloped an existing system to support customer account management, scheduling, and time tracking; enabled dynamic API calls with the help of Amazon API Gateway, AWS Lambda, and DynamoDB.</li>
                </ul>
              </div>
              <div class="col-md-12 mt-4 mt-md-0 icon-box" data-aos="fade-up" data-aos-delay="100">
                <h4 style="text-align:left;"><a href="https://www.epitomesolutions.in/" style="color:#12d640">Epitome Corporation Pvt. Ltd.</a><br> </h4>
                <h5 style="text-align:left;">July 2019 - Dec 2019</h5>
                <p style="text-align:left;color:#fff"><em>Software Developer</em></p>
                <ul style="text-align:left;">
                  <li>Tested, designed, and developed backend APIs of WebRTC enabled multi‑party video conferencing web application and delivered the project 15 days ahead of schedule by efficiently designing the flow of the project.</li>
                </ul>
              </div>
              <div class="col-md-12 mt-4 mt-md-0 icon-box" data-aos="fade-up" data-aos-delay="100">
                <h4 style="text-align:left;"><a href="https://www.meditab.com/" target="_blank" style="color:#12d640">Meditab Software Pvt. Ltd.</a><br> </h4>
                <h5 style="text-align:left;">May 2018 - June 2018</h5>
                <p style="text-align:left;color:#fff"><em>Programmer Analyst</em></p>
                <ul style="text-align:left;">
                  <li>Optimized image processing algorithm of pill detection by creating customized MASKRCNN  algorithm, increasing accuracy by 15%; trained classification algorithm with the help of triplet loss to learn the image embedding of pill, reducing the hassle of collecting data of new pills. </li>
                  <li>Devised a pipeline of the project to incorporate it into the product of the company. Implemented Restful APIs in Django that enabled our quality Analyst team to increase reporting speed by 46%.</li>
                  <li>Built a web app to onboard data from the company’s product using Flask, Postgres, and AWS S3, enabling interactive charts in real-time.</li>
                  <li>Mentored 2 interns to optimize the pill detection algorithm and to include the multiprocessing pipeline, increasing overall speed by 75%.</li>
                </ul>
              </div>
              <div class="col-md-12 mt-4 mt-md-0 icon-box" data-aos="fade-up" data-aos-delay="100">
                <h4 style="text-align:left;"><a href="https://www.sac.gov.in/Vyom/index.jsp" target="_blank" style="color:#12d640">Space Application Centre, ISRO</a><br> </h4>
                <h5 style="text-align:left;">Jan 2018 - May 2018</h5>
                <p style="text-align:left;color:#fff"><em>Research Intern</em></p>
                <ul style="text-align:left;">
                  <li>Implemented noise reduction algorithm on the satellite image and prepared architecture for detecting objects in high‑resolution satellite images, achieving 80% accuracy.</li>
                  <li>Increased accessibility of satellite image data by redesigning database and application for showcasing graphical data.</li>
                </ul>
            </div>
          </div>
        </div>
    </div>
  </section>

  <!-- End Experience Section -->



  <!-- Start Project Section -->
  <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h2>Publications</h2>
      </div>

      <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">Web-App</li>
            <li data-filter=".filter-project">Project</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container">

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <center><h4>Twitter Analysis</h4></center>
          <div class="portfolio-wrap">
            <img src="assets/img/project/twitteranalysis.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              
              <div class="portfolio-links">
                <a href="projects/twitteranalysis.html" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox" title="Project Details"><i class="bx bx-info-circle"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <center><h4>Image recognition as Service</h4></center>
          <div class="portfolio-wrap">
            <img src="assets/img/project/iras.jpeg" class="img-fluid" alt="">
            <div class="portfolio-info">
              
              <div class="portfolio-links">
                <a href="projects/iras.html" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox" title="Project Details"><i class="bx bx-info-circle"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <center><h4>Music Streaming Website</h4></center>
          <div class="portfolio-wrap">
            <img src="assets/img/project/musicplayer.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              
              <div class="portfolio-links">
                <a href="projects/musicplayer.html" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox" title="Project Details"><i class="bx bx-info-circle"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <center><h4>Movie Recommender</h4></center>
          <div class="portfolio-wrap">
            <img src="assets/img/project/recommender.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              
              <div class="portfolio-links">
                <a href="projects/recommender.html" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox" title="Project Details"><i class="bx bx-info-circle"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <center><h4>To-Do App</h4></center>
          <div class="portfolio-wrap">
            <img src="assets/img/project/todo.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <div class="portfolio-links">
                <a href="projects/todo.html" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox" title="Project Details"><i class="bx bx-info-circle"></i></a>
              </div>
            </div>
          </div>
        </div> -->

        <div class="col-lg-4 col-md-6 portfolio-item filter-project">
          <!-- <br> -->
          <center><h4>Resume Section Classifier</h4></center>
          <div class="portfolio-wrap">
            <img src="assets/img/project/resume.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Resume Section Classifier</h4>
              <div class="portfolio-links">
                <a href="projects/resume.html" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox" title="Project Details"><i class="bx bx-info-circle"></i></a>
              </div>
            </div>
          </div>
        </div>

     

        <div class="col-lg-4 col-md-6 portfolio-item filter-project">
          <center><h4>Video Description Generator</h4></center>
          <div class="portfolio-wrap">
            <img src="assets/img/project/vdg.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <div class="portfolio-links">
                <a href="projects/vdg.html" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox" title="Project Details"><i class="bx bx-info-circle"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <center><h4>ML-DL Web-App</h4></center>
          <div class="portfolio-wrap">
            <img src="assets/img/project/ml.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <div class="portfolio-links">
                <a href="projects/ml.html" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox" title="Project Details"><i class="bx bx-info-circle"></i></a>
              </div>
            </div>
          </div>
        </div>

        

        <div class="col-lg-4 col-md-6 portfolio-item filter-project">
          <!-- <br> -->
          <center><h4>Image Generator</h4></center>
          <div class="portfolio-wrap">
            <img src="assets/img/project/gan.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <div class="portfolio-links">
                <a href="projects/gan.html" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox" title="Project Details"><i class="bx bx-info-circle"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- End Project Section -->



  <!-- Start Skills Section -->

  <section id="skills" class="services">
    <div class="container">
      <div class="section-title">
        <h2>Others</h2>
      </div>
      <div class="row">
        <div class="col-lg-12" data-aos="fade-up">
          <div class="col-md-12 mt-4 mt-md-0 icon-box" data-aos="fade-up" data-aos-delay="100" style="background:#fff">
            <h4 style="text-align:left;color:#09203a">Languages and Databases</h4>
                <p style="text-align:left;">
                  <img src="https://www.vectorlogo.zone/logos/python/python-horizontal.svg" alt="vectorlogo.zone" height="50" width="150">
                  <img src="https://www.vectorlogo.zone/logos/java/java-horizontal.svg" alt="vectorlogo.zone" height="50" width="120">
                  <img src="https://www.vectorlogo.zone/logos/w3_html5/w3_html5-ar21.svg" alt="vectorlogo.zone">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/CSS3_logo_and_wordmark.svg" alt="upload.wikimedia.org" height="60" width="90">
                  <img src="https://www.vectorlogo.zone/logos/mysql/mysql-horizontal.svg" alt="vectorlogo.zone" height="70" width="130">
                  <img src="https://www.vectorlogo.zone/logos/postgresql/postgresql-horizontal.svg" alt="vectorlogo.zone" height="50" width="190">

                </p>
            </div>
            <div class="col-md-12 mt-4 mt-md-0 icon-box" data-aos="lefade-up" data-aos-delay="100" style="background:#fff">
              <h4 style="text-align:left;color:#09203a">Frameworks</h4>
                <p style="text-align:left;">
                  <img src="https://www.vectorlogo.zone/logos/pocoo_flask/pocoo_flask-ar21.svg" alt="vectorlogo.zone">
                  <img src="https://www.vectorlogo.zone/logos/djangoproject/djangoproject-ar21.svg" alt="vectorlogo.zone">
                  <img src="https://www.vectorlogo.zone/logos/nodejs/nodejs-horizontal.svg" alt="vectorlogo.zone">
                  <img src="https://www.vectorlogo.zone/logos/getbootstrap/getbootstrap-ar21.svg" alt="vectorlogo.zone">
                  <img src="https://www.vectorlogo.zone/logos/tensorflow/tensorflow-ar21.svg" alt="vectorlogo.zone">
                  <img src="https://www.vectorlogo.zone/logos/pytorch/pytorch-ar21.svg" alt="vectorlogo.zone">
                  <img src="https://www.vectorlogo.zone/logos/opencv/opencv-ar21.svg" alt="vectorlogo.zone">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/0/05/Scikit_learn_logo_small.svg" alt="upload.wikimedia.org" width="90" height="70">
              </p>
          </div>
          <div class="col-md-12 mt-4 mt-md-0 icon-box" data-aos="lefade-up" data-aos-delay="100" style="background:#fff">
              <h4 style="text-align:left;color:#09203a">Tools</h4>
                <p style="text-align:left;">
                  <img src="https://www.vectorlogo.zone/logos/git-scm/git-scm-ar21.svg" alt="vectorlogo.zone">
                  <img src="https://www.vectorlogo.zone/logos/amazon_aws/amazon_aws-ar21.svg" alt="vectorlogo.zone">
                  <img src="https://www.vectorlogo.zone/logos/google_cloud/google_cloud-ar21.svg" alt="vectorlogo.zone">
                  <img src="https://www.vectorlogo.zone/logos/heroku/heroku-ar21.svg" alt="vectorlogo.zone">
                  <img src="https://www.vectorlogo.zone/logos/jupyter/jupyter-ar21.svg" alt="vectorlogo.zone">
              </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- End Skills Section -->




  <!-- Start Links section -->
  <section id="links" class="services">
    <div class="container">
      <div class="section-title">
        <h2>Resume & Links</h2>
      </div>
      <div class="row">
        <div class="col-md-3 mt-4 mt-md-0 icon-box" data-aos="fade-up" data-aos-delay="100">
          <a href="https://drive.google.com/file/d/1iHBNV2UkH5LkhAP-1hYRZ2Ez_BQ6g4S7/view?usp=sharing" target="_blank"><div class="icon"><i class="icofont-page"></i></div></a>
          <h4 class="title"><a href="https://drive.google.com/file/d/1iHBNV2UkH5LkhAP-1hYRZ2Ez_BQ6g4S7/view?usp=sharing" target="_blank">Resume</a></h4>
          <p class="description" style="color:#fff;">The link contains downloadable resume</p>
        </div>
        <div class="col-md-3 mt-4 mt-md-0 icon-box" data-aos="fade-up">
          <a href="https://github.com/rajaprerak/LeetCode_Problems" target="_blank"><div class="icon"><i class="icofont-link"></i></div></a>
          <h4 class="title"><a href="https://github.com/rajaprerak/LeetCode_Problems" target="_blank">LeetCode Repository</a></h4>
          <p class="description" style="color:#fff;"> The github repository contains leetcode problems solution in python.</p>
        </div>
        <!-- <div class="col-md-3 mt-4 mt-md-0 icon-box" data-aos="fade-up" data-aos-delay="100">
          <a href="https://techingenious.herokuapp.com/" target="_blank"><div class="icon"><i class="icofont-page"></i></div></a>
          <h4 class="title"><a href="https://techingenious.herokuapp.com/" target="_blank">Blog</a></h4>
          <p class="description" style="color:#fff;">Blog containing articles on AI, coding, development</p>
        </div> -->
      </div>
    </div>
  </section> <!--End Links Section -->


  <!-- Start Contact Section -->

  <section id="contacts" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Contact</h2>
      </div>

      <div class="row mt-2">

        <div class="col-md-6 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-map"></i>
            <h3>My Address</h3>
            <p>1275 E University Dr</p>
            <p>Unit 212</p>
            <p>Tempe, AZ 85281</p>
          </div>
        </div>

        <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-share-alt"></i>
            <h3>Social Profiles</h3>
            <div class="social-links">
              <a href="https://www.linkedin.com/in/rajaprerak" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              <a href="https://www.github.com/rajaprerak" target="_blank" class="github"><i class="bx bxl-github"></i></a>
              <a href="mailto:rajaprerak@gmail.com" target="_blank" class="google"><i class="bx bxl-google"></i></a>

            </div>
          </div>
        </div>

        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-envelope"></i>
            <h3>Email</h3>
            <p>rajaprerak@gmail.com</p>
            <p>pkraja@asu.edu</p>
          </div>
        </div>
        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-phone-call"></i>
            <h3>Contact</h3>
            <p>+1 480-401-8112</p>
          </div>
        </div>
      </div>
      <!-- <div id="sfczmlqxr5caww28rswrt8849ghbekgnh3j" ></div><script type="text/javascript" src="https://counter1.stat.ovh/private/counter.js?c=zmlqxr5caww28rswrt8849ghbekgnh3j&down=async" async></script><noscript><a href="https://www.freecounterstat.com" title="free web counter"><img src="https://counter1.stat.ovh/private/freecounterstat.php?c=zmlqxr5caww28rswrt8849ghbekgnh3j" border="0" title="free web counter" alt="free web counter" style="visibility: none;"></a></noscript> -->
    </div>
  </section>

  <!-- End Contact Section -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script type="text/javascript">
    var typed = new Typed('.typing',{
      strings: ["Coder", "Developer", "AI Enthusiast"],
      loop: true,
      typeSpeed: 65,
      backSpeed: 65
    });
  </script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
