<?php defined('SYSPATH') or die('No direct script access.');
/**
 * A simple "flash message" system.
 *
 * @package    Kohana
 * @category   Base
 * @author     Kohana Team
 * @copyright  (c) 2008-2010 Kohana Team
 * @license    http://kohanaphp.com/license
 */
class Kohana_Message {

	/**
	 * @var  string  default session key used for storing messages
	 */
	public static $session_key = 'message';

	public static $config = NULL;

	const SUCCESS = 'success';
	const INFO    = 'info';
	const ERROR   = 'error';
	const WARNING = 'warning';

	/**
	 * Adds a new message.
	 *
	 * @param   string  message type (e.g. Message::SUCCESS)
	 * @param   string|array  message text
	 * @param   array   any options for the message
	 * @return  void
	 */
	public static function set($type, $text, array $attributes = NULL)
	{
		if (is_array($text))
		{
			foreach ($text as $msg)
			{
				static::set($type, $msg, $attributes);
			}

			return;
		}

		// Load existing messages
		$messages = (array) Message::get();

		// Add new message
		$messages[] = (object) array(
			'type'    => $type,
			'text'    => $text,
			'attributes' => (array) $attributes,
		);

		// Store the updated messages
		Session::instance()->set(Message::$session_key, $messages);
	}

	/**
	 * Returns all messages.
	 *
	 * @return  array or NULL
	 */
	public static function get()
	{
		return Session::instance()->get(Message::$session_key);
	}

	/**
	 * Clears all messages.
	 *
	 * @return  void
	 */
	public static function clear()
	{
		Session::instance()->delete(Message::$session_key);
	}

	/**
	 * Renders the message(s), and by default clears them too.
	 *
	 * @param   mixed    string of the view to use, or a Kohana_View object
	 * @param   boolean  set to FALSE to not clear messages
	 * @return  string   message output (HTML)
	 */
	public static function render($profile = 'default', $clear = TRUE)
	{
		// Load config
		if ( ! Message::$config)
		{
			Message::$config = Kohana::$config->load('message');
		}

		// Nothing to render
		if (($messages = Message::get()) === NULL)
			return '';

		// Clear all messages
		if ($clear)
		{
			Message::clear();
		}

		if ( ! isset(Message::$config->$profile))
		{
			throw new Kohana_Exception('Message profile :name not defined in configuration',
				array(':name' => $profile));
		}

		// Return the rendered view
		return View::factory(Message::$config->{$profile}['view'])
			->set('messages', $messages)
			->set('classes', Message::$config->{$profile}['classes'])
			->render();
	}

}
