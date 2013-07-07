# How to use?

### In controller (create message)
```php
// syntax
Message::set($type, $text, array $options = NULL);

// simple set success message
Message::set(Message::SUCCESS, 'You successful logged in!');

// set error message with option
Message::set(Message::ERROR, 'Sorry, we have an error 404!', array('id' => 'error-404'));
```

### In view (render messages)
```php
// syntax
Message::render($profile = 'default', $clear = TRUE);

// render messages (default profile)
Message::render();

// render messages without clean session (default profile)
Message::render(NULL, FALSE);

// render messages (bootstrap profile)
Message::render('bootstrap');
```

### Exist types
~~~php
Message::SUCCESS
Message::INFO
Message::ERROR
Message::WARNING
~~~
You can add types into file `Message.php`, do not forget to add classes into config.


# Settings

### Session key
To change session key, paste this code into `bootstrap.php`
```php
/**
 * Set the messages session key
 */
Message::$session_key = 'my_session_key';
```

### Profiles
All profiles located in the config file `message.php`. You can modify current profiles, or create own profiles.
