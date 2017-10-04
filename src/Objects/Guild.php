<?php
/**
 * The Guild object.
 *
 * To find more details, check the documentation below
 * @link https://discordapp.com/developers/docs/resources/guild#guild-object
 */

namespace Discord\Objects;

use \Discord\Objects\Role\RoleArray;
use \Discord\Objects\Emojis\EmojisArray;
use \Discord\Discord;

/**
 * Class Guild
 */
class Guild
{
    /**
     * Contains snowflake
     * @link https://github.com/twitter/snowflake
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @link https://discordapp.com/developers/docs/reference#image-formatting
     * @var string
     */
    public $icon;

    /**
     * @link https://discordapp.com/developers/docs/reference#image-formatting
     * @var string
     */
    public $splash;

    /**
     * Contains snowflake
     * @link https://github.com/twitter/snowflake
     * @var string
     */
    public $owner_id;

    /**
     * @var string
     */
    public $region;

    /**
     * Contains snowflake
     * @link https://github.com/twitter/snowflake
     * @var string
     */
    public $afk_channel_id;

    /**
     * @var int
     */
    public $afk_timeout;

    /**
     * @var bool
     */
    public $embed_enabled;

    /**
     * Contains snowflake
     * @link https://github.com/twitter/snowflake
     * @var string
     */
    public $embed_channel_id;

    /**
     * Level of verification
     * @var int
     */
    public $verification_level;

    /**
     * @var integer
     */
    public $default_message_notifications;

    /**
     * @var integer
     */
    public $explicit_content_filter;

    /**
     * @var RoleArray
     */
    public $roles;

    /**
     * @var EmojisArray
     */
    public $emojis;

    /**
     * @var array
     */
    public $features;

    /**
     * @var integer
     */
    public $mfa_level;

    /**
     * Contains snowflake
     * @link https://github.com/twitter/snowflake
     * @var ?string
     */
    public $application_id;

    /**
     * @var bool
     */
    public $widget_enabled;

    /**
     * Contains snowflake
     * @link https://github.com/twitter/snowflake
     * @var string
     */
    public $widget_channel_id;


    public function __construct($guildid, $token_type, $token)
    {

        $ch = curl_init(); //

        curl_setopt_array($ch, array(
            CURLOPT_URL => "http://discordapp.com/api/v" . Discord::$apiv . "/guilds/" . $guildid,
            CURLOPT_HTTPHEADER => array('Authorization: ' . $token_type . ' ' . $token),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_VERBOSE => 1,
            CURLOPT_SSL_VERIFYPEER => 0,
        ));

        $data = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($data, true);

        if (isset($data['code']) && isset($data['message'])) {
            echo $data['code'] . ": " . $data['message'];
        } else {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->icon = $data['icon'];
            $this->splash = $data['splash'];
            $this->owner_id = $data['owner_id'];
            $this->region = $data['region'];
            $this->afk_channel_id = $data['afk_channel_id'];
            $this->afk_timeout = $data['afk_timeout'];
            $this->embed_enabled = $data['embed_enabled'];
            $this->embed_channel_id = $data['embed_channel_id'];
            $this->verification_level = $data['verification_level'];
            $this->default_message_notifications = $data['default_message_notifications'];
            $this->explicit_content_filter = $data['explicit_content_filter'];
            $this->roles = new RoleArray($data['roles']);
            $this->emojis = new EmojisArray($data['emojis']);
            $this->features = $data['features'];
            $this->mfa_level = $data['mfa_level'];
            $this->application_id = $data['application_id'];
            $this->widget_enabled = $data['widget_enabled'];
            $this->widget_channel_id = $data['widget_channel_id'];
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getIcon()
    {
        return $this->icon;
    }

    public function getSplash()
    {
        return $this->splash;
    }

    public function getOwnerId()
    {
        return $this->owner_id;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function getAfkChannelId()
    {
        return $this->afk_channel_id;
    }

    public function getAfkTimeout()
    {
        return $this->afk_timeout;
    }

    public function getEmbedEnabled()
    {
        return $this->embed_enabled;
    }

    public function getEmbedChannelId()
    {
        return $this->embed_channel_id;
    }

    /*
     * @return int 0 - 4
     * https://discordapp.com/developers/docs/resources/guild#guild-object-verification-level
     */
    public function getVertificationLevel()
    {
        return $this->vertification_level;
    }

    /*
     * @return int 0 or 1
     * https://discordapp.com/developers/docs/resources/guild#guild-object-default-message-notification-level
     */
    public function getDefaultMessageNotifications()
    {
        return $this->default_message_notifications;
    }
    

    public function getRoles()
    {
        return $this->roles;
    }

    public function getEmojis()
    {
        return $this->emojis;
    }

    public function getFeatures()
    {
        return $this->features;
    }

    /*
     * @return int 0 or 1
     * https://discordapp.com/developers/docs/resources/guild#guild-object-mfa-level
     */
    public function getMFALevel()
    {
        return $this->mfa_level;
    }

    public function getApplicationId()
    {
        return $this->application_id;
    }

    public function getWidgetEnabled()
    {
        return $this->widget_enabled;
    }

    public function getWidgetChannelId()
    {
        return $this->widget_channel_id;
    }

}
