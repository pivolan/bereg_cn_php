<?php
	class app_search extends app_mysql{
		public $search;
		protected $table='search';
		function init($text){
			$this->search=$text;
		}
		function show_news_title(){
			$news=new app_new;
			$news->initelse(" (locate(lower('$this->search'),lower(title))>0)");
			if($news->num()>0)$output="<h1> Новости заголовок</h1>\n";
			while($news->one()){
				$news->title=str_replace($this->search, "<span class='highlight'>$this->search</span>" ,$news->title);
				$output.= "<h2><a href=\"$news->url\">$news->title</a></h2>\n
				<p>".$news->short(30)."...</p> ";
			}
			return $output;
		}
		function show_news_text(){
			$news=new app_new;
			$news->initelse("(locate(lower('$this->search'),lower(text))>0) OR (locate(lower('$this->search'),lower(title))>0)");
			if($news->num()>0)$output="<h1> Новости текст</h1>\n";
			else $output='';
			while($news->one()){
				$news->title=str_replace($this->search, "<span class='highlight'>$this->search</span>" ,$news->title);
				$output.= "<h2><a href=\"$news->url\">$news->title</a></h2>\n
				<p>".app_common::search_text(150, $this->search, $news->text)."</p> ";
			}
			return $output;
		}
		function show_pages_title(){}
		function show_pages_text(){
			$news=new app_page;
			$news->initelse("(locate(lower('$this->search'),lower(text))>0) OR (locate(lower('$this->search'),lower(title))>0)");
			if($news->num()>0)$output="<h1> Страницы</h1>\n";
			else $output='';
			while($news->one()){
				$news->text=strip_tags($news->text);
				$news->title=str_replace($this->search, "<span class='highlight'>$this->search</span>" ,$news->title);
				$output.= "<h2><a href=\"$news->url\">$news->title</a></h2>\n
				<p>".app_common::search_text(150, $this->search, $news->text)."</p> ";
			}
			return $output;
		}
		function show_cat(){}
		function show_subcat(){}
		function show_article_title(){}
		function show_article_text(){
			$article=new app_article;
			$cat=new app_category;
			$subcat=new app_subcat;
			$link=new app_menuLeft;
			$article->initelse("(locate(lower('$this->search'),lower(text))>0) OR (locate(lower('$this->search'),lower(title))>0)");
			if($article->num()>0)$output="<h1> Оборудование и проекты</h1>\n";
			else $output='';
			while($article->one()){
				$link->initelse("title='$article->parent'");
				$link->one();
				$article->text=strip_tags($article->text);
				$article->title=str_replace($this->search, "<span class='highlight'>$this->search</span>" ,$article->title);
				$output.= "<h2><a href=\"".$link->url."?cat=".$article->cat."&subcat=".$article->subcat.$article->url."\">$article->title</a></h2>\n
				<p>".app_common::search_text(350, $this->search, $article->text)."</p> ";
			}
			return $output;
		}
	}
?>