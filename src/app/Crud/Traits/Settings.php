<?php


namespace Nggiahao\Tessa\app\Crud\Traits;


use Illuminate\Support\Arr;

trait Settings
{
    protected $settings = [];

    /**
     * Getter for the settings key-value store.
     *
     * @param string $key Usually operation.name (ex: list.exportButtons)
     *
     * @param null $default
     *
     * @return mixed [description]
     */
    public function get(string $key, $default = null)
    {
        return Arr::get($this->settings, $key, $default);
    }

    /**
     * Setter for the settings key-value store.
     *
     * @param string $key Usually operation.name (ex: reorder.max_level)
     * @param bool $value True/false depending on success.
     *
     * @return Settings
     */
    public function set(string $key, $value)
    {
        Arr::set($this->settings, $key, $value);
        return $this;
    }

    /**
     * Check if the settings key is used (has a value).
     *
     * @param string $key Usually operation.name (ex: reorder.max_level)
     *
     * @return bool
     */
    public function has(string $key)
    {
        return Arr::has($this->settings, $key);
    }

    /**
     * Get all operation settings
     *
     * @return array
     */
    public function settings()
    {
        return $this->settings;
    }

    /**
     * Getter and setter for the settings key-value store.
     *
     * @param string $key   Usually operation.name (ex: list.exportButtons)
     * @param mixed  $value The value you want to store.
     *
     * @return mixed Setting value for setter. True/false for getter.
     */
    public function setting(string $key, $value = null)
    {
        if ($value === null) {
            return $this->get($key);
        }

        return $this->set($key, $value);
    }

    /**
     * Convenience method for getting or setting a key on the current operation.
     *
     * @param $operation
     * @param string $key Has no operation prepended. (ex: exportButtons)
     * @param mixed $value The value you want to store.
     *
     * @return mixed Setting value for setter. True/false for getter.
     */
    public function operationSetting($operation, string $key, $value = null)
    {
        return $this->setting($operation.'.'.$key, $value);
    }

    /**
     * Getter for the settings key-value store on a certain operation.
     * Defaults to the current operation.
     *
     * @param string $key Has no operation prepended. (ex: exportButtons)
     *
     * @param $operation
     *
     * @return mixed [description]
     */
    public function getOperationSetting(string $key, $operation)
    {
        return $this->get($operation.'.'.$key, null);
    }

    /**
     * Check if the settings key is used (has a value).
     * Defaults to the current operation.
     *
     * @param string $key Has no operation prepended. (ex: exportButtons)
     *
     * @param $operation
     *
     * @return mixed [description]
     */
    public function hasOperationSetting(string $key, $operation)
    {
        return $this->has($operation.'.'.$key);
    }

    /**
     * Setter for the settings key-value store for a certain operation.
     * Defaults to the current operation.
     *
     * @param string $key Has no operation prepended. (ex: max_level)
     * @param $value
     * @param $operation
     *
     * @return Settings
     */
    public function setOperationSetting(string $key, $value, $operation)
    {
        return $this->set($operation.'.'.$key, $value);
    }

    /**
     * Automatically set values in config file (config/tessa/crud)
     * as settings values for that operation.
     *
     * @param $operation
     */
    public function loadDefaultOperationSettingsFromConfig($operation)
    {
        $config_settings = config('tessa.crud.operations.'.$operation);

        if (is_array($config_settings) && count($config_settings)) {
            foreach ($config_settings as $key => $value) {
                $this->setOperationSetting($key, $value, $operation);
            }
        }
    }
}