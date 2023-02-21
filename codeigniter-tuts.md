---

---

# An overview of codeigniter

CodeIgniter is a lightweight yet powerful open-source PHP framework for building web applications. It features a small footprint, a simple and easy-to-use interface, and a rich set of libraries and helpers to facilitate the development process. CodeIgniter allows developers to quickly build high-quality, scalable applications without the overhead of more complex frameworks. It also provides a robust and flexible MVC architecture, making it a popular choice for web developers who value simplicity, efficiency, and extensibility.


#### 1: Downlaod & setup: 
First download the codeigniter project skeleton from the url: https://cutt.ly/j32ZnIT . Now extract and paste inside your server folder. In this case I am using xampp. So, inside my htpdocs folder I just need to paste the folder. After doing that go to your browser and visit this link: localhost/{what ever your folder name}. 

For coding, we will use VS Code. Open the project folder on VSC. 

#### 2. Features:
Before dive into coding let's talk about codeigniter's featrues. It's MVC based, MVC means Model View and Controller. Model structure your data, controller handles those data and show via the view. So simple, it's very popular design pattern used by many other frameworks. Codeigniter is very light weight and super fast. The core framework files typically take up less 2MB where laravel take up around 50mb of disk space. Here is the full features list in v3: 
	- MVC  
	- Light weight
	- Full featured database classes with support. 
	- Query Builder
	- Form & data validation
	- Security & XXS Filtering 
	- Session management
	- Email sending
	- Image manipulating 
	- File uploading    
	- FTP class
	- Localization
	- Pagination
	- Data encryption
	- Benchmarking
	- Fullpage caching
	- Error logging 
	- Application profiling
	- Calendaring class
	- User agent class
	- Zip encoding 
	- Template engine
	- Trackback class
	- XML-RPC class
	- Unit testing class
	- SEO friendly urls
	- Flexible URI routing
	- Support for hooks and class extensions
	- Large library for helper functions

#### 3. Controllers:
Controller is the is the middle man between model and views. It handles data through model and serves to the view. In side `/application/controllers` all your controllers go. 

Let's create a controller called `Pages.php` and inside `application/config/routes.php` make the default controller to pages controller. Remember, I did not use `PagesController` because the codeigniter's route will be based on this controller name like: `/{controller}/{method}/{method_parameters}`. And inside `Pages` controller class write down this code:
```php 
<?php 

class Pages extends CI_Controller {
    public function index() {
        echo 'Pages Controller';
    }

    public function about() {
        echo 'about page'; 
    }
}
```

Now, visit `/pages`, you will see `Pages Controller` and for `/pages/about` you see `about page`. 

**Note: Before visiting, you have to add this `.htaccess` file and content in your project root**
```bash
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
```
#### 4. Views
From controller's method instead of echoing something let's return a html view. Inside your `views` folder create `pages` folder and add page called `home.php` and add write some html tags inside the file. 

After adding file, go to your pages controller and change the content to the following: 
```php 
public function index() {
	
	$data['title'] = 'Home Page';

	$this->load->view('pages/home', $data); 
}
```

Here I have defined an array caled `$data ` and pass to the html view. Now I have access to those array keys of `$data`. So, the view method taking two parameters. The first one is a string for the html view location and the second one an array of some data. Now go the browser and visit: `/pages`, you see the content inside your html file. 

Now let's break down more things. Inside your html file, you have everything including html heading and body. Extract from the heading and footer into two files called, `header.html` and `footer.html`. And in the `home.php` file, just leave the content should go in the body of the html file.

Now update the controller code like this:
```php 
<?php 

class Pages extends CI_Controller {

    public function index() {

        $data['title'] = 'Home Page';

        $this->load->view('header', $data);
        $this->load->view('pages/home', $data); 
        $this->load->view('footer');
    }

    public function about() {

        $data['title'] = 'About page';
        
        $this->load->view('pages/about', $data); 
    }
}

```

#### 5. Database Conntection
There are two ways of connecting to a datbase. First of all, let's configure the database. Inside `/config/database.php`, you can conigure the DB credentials like following:
```php 
$db['default'] = array(
	'hostname' => 'localhost',  // host name
	'username' => 'root',       // database user name. Mine one is default root
	'password' => 'password',   // add your own password, I chose 'password'
	'database' => 'codeigniter',// db name, I chose 'codeigniter` 
);
```

After doing above actions, you can now load your database from controller or model. Let's explore inside a controller. Inside our pages controller, we will create a new function for uers page like following: 
```php	
public function users() {
	
	$this->load->database();

	$query = $this->db->query('select * from users');

	$result = $query->result();

	var_dump($result); 
}
```
After doing these, you can see on browser `/pages/users` some data. 

Now, let's create a view for users page and pass the `$result` array to the view. So inside your `/views/pages` directory create a file called users.php and add the following code: 
```html
<ul>
    <?php foreach ($users as $user): ?>
        <li>
            <?= $user->username ?>
        </li>
    <?php endforeach; ?>
</ul>
```

And update your your controller method like the following code:
```php
public function users() {
	
	$this->load->database();

	$query = $this->db->query('select * from users');

	$result = $query->result();
	
	$data['title'] = 'Users';
	$data['users'] = $result;

	$this->load->view('header', $data);
	$this->load->view('pages/users', $data);
	$this->load->view('footer'); 
}
```

#### 6. Model 
Now, let's start using model. Using query will be very productive as we don't have to write all db logic in our controller. Let's first create a model inside `application/models` directory called `User_model.php` and write the following code: 
```php
<?php 

class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_users()
    {
        $query = $this->db->get('users');
        return $query->result();
    }
}   
```

And update the controller: 
```php 
<?php 

class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model'); 
    }
 
    public function users() {
        
        $this->load->database();

        $result = $this->User_model->get_users(); 
        
        $data['title'] = 'Users';
        $data['users'] = $result;

        $this->load->view('header', $data);
        $this->load->view('pages/users', $data);
        $this->load->view('footer'); 
    }
}
```

Conclusion: here is the basic overview of codeigniter 3. There is a lot of learning and all are really easy to learn. Now you can move forward using the advanced features used in codeigniter.

