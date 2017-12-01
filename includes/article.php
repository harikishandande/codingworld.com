<?php
  
   class Article
   {	
		public function fetch_search($search)
		 {
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM lp_aims A WHERE A.aim LIKE '%$search%' or A.fullaim LIKE '%$search%';");
			$query->execute();
			return $query ->fetchAll();
		 }
		public function fetch_syllabustopics($uid)
		 {
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM syllabus WHERE uid = ?");
			$query->bindValue(1,$uid);
			$query->execute();
			 return $query ->fetchAll();
		 }
		 public function fetch_progtoedit($id)
	  {
	     global $pdo;
		 $query= $pdo->prepare("SELECT * FROM lp_newmethods WHERE id = ?");
		 $query->bindValue(1,$id);
		 $query->execute();
		 return $query ->fetch();
	  }
		 public function fetch_aimtoedit($id)
	  {
	     global $pdo;
		 $query= $pdo->prepare("SELECT * FROM lp_aims WHERE id = ? ");
		 $query->bindValue(1,$id);
		 $query->execute();
		 return $query ->fetch();
	  }
		 public function fetch_prog($id)
			 {
				global $pdo;
			$query= $pdo->prepare("SELECT * FROM lp_aims WHERE lp_subid = ? ");
			$query->bindValue(1,$id);
			$query->execute();
			return $query ->fetchAll();
			}
			
		public function fetch_proghome()
			 {
				global $pdo;
			$query= $pdo->prepare("SELECT * FROM lp_aims order by aim_timestamp DESC ");
			$query->execute();
			return $query ->fetchAll();
			}

public function fetch_program($id)
 {
    global $pdo;

$query= $pdo->prepare("SELECT * FROM lp_newmethods WHERE lp_aimid=?");
$query->bindValue(1,$id);
$query->execute();
return $query ->fetchAll();
 }
		 public function fetch_moderators($username)
		  {
			 global $pdo;

			 $query= $pdo->prepare("SELECT * FROM moderators WHERE username = ?");
			 $query->bindValue(1,$username);
			 $query->execute();
			 return $query ->fetch();
		  }	
		  public function fetch_moderator($username)
		  {
			 global $pdo;

			 $query= $pdo->prepare("SELECT * FROM moderators WHERE pid = (SELECT id FROM proffesors WHERE username = ?)");
			 $query->bindValue(1,$username);
			 $query->execute();
			 return $query ->fetch();
		  }	
		  public function fetch_comments($sid)
		  {
			 global $pdo;

			 $query= $pdo->prepare("SELECT * FROM comments WHERE sid = ?");
			 $query->bindValue(1,$sid);
			 $query->execute();
			 return $query ->fetchAll();
		  }	
		 public function fetch_mtenrolls()
		  {
			 global $pdo;

			 $query= $pdo->prepare("SELECT * FROM mt_enroll");
			 $query->execute();
			 return $query ->fetchAll();
		  }
		  public function fetch_mtenroll($guest)
		  {
			 global $pdo;

			 $query= $pdo->prepare("SELECT * FROM mt_enroll WHERE name = ?");
			 $query->bindValue(1,$guest);
			 $query->execute();
			 return $query ->fetchAll();
		  }
		   public function fetch_contactus()
		  {
			 global $pdo;

			 $query= $pdo->prepare("SELECT * FROM contactus");
			 $query->execute();
			 return $query ->fetchAll();
		  }
		  public function fetch_contact($guest)
		  {
			 global $pdo;

			 $query= $pdo->prepare("SELECT * FROM contactus WHERE name = ?");
			 $query->bindValue(1,$guest);
			 $query->execute();
			 return $query ->fetchAll();
		  }
		  public function fetch_proffesors($subject)
		  {
			 global $pdo;

			 $query= $pdo->prepare("SELECT * FROM proffesors WHERE id = (SELECT pid FROM subjects WHERE subject = ?)");
			 $query->bindValue(1,$subject);
			 $query->execute();
			 return $query ->fetchAll();
		  }
		  public function fetch_proffesor($username)
		  {
			 global $pdo;

			 $query= $pdo->prepare("SELECT * FROM proffesors WHERE username = ?");
			 $query->bindValue(1,$username);
			 $query->execute();
			 return $query ->fetchAll();
		  }
		  public function fetch_subjects()
		  {
			 global $pdo;

			 $query= $pdo->prepare("SELECT * FROM subjects");
			 $query->execute();
			 return $query ->fetchAll();
		  }
		   public function fetch_subject($subject)
		  {
			 global $pdo;

			 $query= $pdo->prepare("SELECT * FROM subjects WHERE subject = ?");
			 $query->bindValue(1,$subject);
			 $query->execute();
			 return $query ->fetch();
		  }
		  public function fetch_subjectid($subject)
		  {
			 global $pdo;

			 $query= $pdo->prepare("SELECT id FROM subjects WHERE subject = ?");
			 $query->bindValue(1,$subject);
			 $query->execute();
			 return $query ->fetch();
		  }
		  public function fetch_subjectusingid($sid)
		  {
			 global $pdo;

			 $query= $pdo->prepare("SELECT * FROM subjects WHERE id = ?");
			 $query->bindValue(1,$sid);
			 $query->execute();
			 return $query ->fetch();
		  }
		  
		  public function fetch_unitusingid($uid)
		  {
			 global $pdo;

			 $query= $pdo->prepare("SELECT * FROM units WHERE id = ?");
			 $query->bindValue(1,$uid);
			 $query->execute();
			 return $query ->fetch();
		  }
		   public function fetch_units($subject)
		  {
			 global $pdo;
			 $query= $pdo->prepare("SELECT * FROM units WHERE sid = (SELECT id FROM subjects WHERE subject = ?)");
			 $query->bindValue(1,$subject);
			 $query->execute();
			 return $query ->fetchAll();
		  }
		  public function fetch_topics($unit)
		  {
			 global $pdo;
			 $query= $pdo->prepare("SELECT * FROM topics WHERE uid = (SELECT id FROM units WHERE unit = ?) ORDER BY listorder");
			 $query->bindValue(1,$unit);
			 $query->execute();
			 return $query ->fetchAll();
		  }
		   public function check_topics($uid)
		  {
			 global $pdo;
			 $query= $pdo->prepare("SELECT * FROM topics WHERE uid = ? ORDER BY listorder");
			 $query->bindValue(1,$uid);
			 $query->execute();
			 return $query ->fetchAll();
		  }
		   public function fetch_topic($id)
		  {
			 global $pdo;
			 $query= $pdo->prepare("SELECT * FROM topics WHERE id = ?");
			 $query->bindValue(1,$id);
			 $query->execute();
			 return $query ->fetch();
		  }
		  public function fetch_content($tid)
		  {
			global $pdo;
			$query= $pdo->prepare("SELECT * FROM topics WHERE id =?");
			$query->bindValue(1,$tid);
			$query->execute();

			return $query->fetch();
		  }
		  
		  public function fetch_usersubject($username)
		  {
			global $pdo;
			$query= $pdo->prepare("SELECT subject,id FROM subjects WHERE pid =(SELECT id FROM proffesors WHERE username = ?)");
			$query->bindValue(1,$username);
			$query->execute();

			return $query->fetch();
		  }
		  
		  public function fetch_userunits($subject)
		  {
			global $pdo;
			$query= $pdo->prepare("SELECT * FROM units WHERE sid =(SELECT id FROM subjects WHERE subject = ?)");
			$query->bindValue(1,$subject);
			$query->execute();

			return $query->fetchAll();
		  }

		  public function fetch_userimage($username)
		  {
			global $pdo;
			$query= $pdo->prepare("SELECT * FROM proffesors WHERE username = ?)");
			$query->bindValue(1,$username);
			$query->execute();

			return $query->fetch();
		  }
		  
		//  public function fetch_unitid($unit)
	//	  {
	//		 global $pdo;
	//		 $query= $pdo->prepare("SELECT id FROM units WHERE unit = ?");
	//		 $query->bindValue(1,$unit);
	//		 $query->execute();
	//		 return $query ->fetch();
	//	  }
		  
		  public function fetch_pall()
		  {
			 global $pdo;
			 $query= $pdo->prepare("SELECT * FROM proffesors");
			 $query->execute();
			 return $query ->fetchAll();
		  }
		  public function fetch_sall()
		  {
			 global $pdo;
			 $query= $pdo->prepare("SELECT * FROM subjects");
			 $query->execute();
			 return $query ->fetchAll();
		  }
		  public function fetch_mall()
		  {
			 global $pdo;
			 $query= $pdo->prepare("SELECT * FROM moderators");
			 $query->execute();
			 return $query ->fetchAll();
		  }
		  public function fetch_lpsuball()
		  {
			 global $pdo;
			 $query= $pdo->prepare("SELECT * FROM lp_subjects");
			 $query->execute();
			 return $query ->fetchAll();
		  }
		  
		  public function fetch_subget($subject)
		  {
			 global $pdo;

			 $query= $pdo->prepare("SELECT * FROM users WHERE subject =?");
			 $query->bindValue(1,$subject);
			 $query->execute();
			 return $query ->fetchAll();
		  }
		  public function fetch_subuser($sname)
		  {
			 global $pdo;

			 $query= $pdo->prepare("SELECT * FROM subjects WHERE sname =?");
			 $query->bindValue(1,$sname);
			 $query->execute();
			 return $query ->fetch();
		  }
		  public function fetch_book($subject)
		  {
			 global $pdo;

			 $query= $pdo->prepare("SELECT * FROM topics WHERE uid = ");
			 $query->bindValue(1,$subject);
			 $query->execute();
			 return $query ->fetchAll();
		  }
		 
		  public function fetch_data($title)
		  {
			global $pdo;
	   
			$query= $pdo->prepare("SELECT * FROM articles WHERE article_title =?");
			$query ->bindValue(1, $title);
			$query ->execute();

			return $query->fetch();
		  }

		  public function fetch_titles($id)
		  {
			global $pdo;
	   
			$query= $pdo->prepare("SELECT * FROM articles WHERE article_id =?");
			$query ->bindValue(1, $id);
			$query ->execute();

			return $query->fetch();
		  }

		  public function fetch_usersub($username)
		  {
			 global $pdo;

			 $query= $pdo->prepare("SELECT * FROM users WHERE user_name = ? ");
			 $query ->bindValue(1, $username);
			 $query->execute();
			 return $query ->fetchAll();
		  }
		  public function fetch_usersuba($username)
		  {
			 global $pdo;

			 $query= $pdo->prepare("SELECT * FROM users WHERE user_name = ? ");
			 $query ->bindValue(1, $username);
			 $query->execute();
			 return $query ->fetchAll();
		  }
		  public function fetch_allsub()
		  {
			 global $pdo;

			 $query= $pdo->prepare("SELECT * FROM subjects");
			 $query->execute();
			 return $query ->fetchAll();
		  }
		  public function fetch_prof()
		  {
			 global $pdo;
			 
			 $query= $pdo->prepare("SELECT user_img, uname, name FROM proffesors");
			 $query->execute();
			 return $query ->fetchAll();
		  }
		  public function fetch_moder()
		  {
			 global $pdo;
			 
			 $query= $pdo->prepare("SELECT moderator_img, username FROM moderators");
			 $query->execute();
			 return $query ->fetchAll();
		  }
	  
    }
 ?>