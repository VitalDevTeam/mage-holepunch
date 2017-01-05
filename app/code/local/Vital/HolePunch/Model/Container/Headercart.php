<?php
class Vital_HolePunch_Model_Container_Headercart extends Enterprise_PageCache_Model_Container_Abstract
{
    protected function _getCacheId()
    {
        return 'HEADER_CART_HOLEPUNCH' . md5($this->_placeholder->getAttribute('cache_id')).'_'.$this->_getIdentifier();
    }

    protected function _renderBlock()
    {
        $blockClass = $this->_placeholder->getAttribute('block');
        $template = $this->_placeholder->getAttribute('template');
        $block = new $blockClass;
        $block->setTemplate($template);
        return $block->toHtml();
    }

    protected function _getIdentifier()
    {
        /* Added the PERSISTENT_COOKIE_NAME as additional measure to improve the Hole Punching */
        $cacheId = $this->_getCookieValue(Enterprise_PageCache_Model_Cookie::COOKIE_CUSTOMER, '')
            . '_'
            . $this->_getCookieValue(Enterprise_PageCache_Model_Cookie::COOKIE_FORM_KEY, '')
            . '_'
            . $this->_getCookieValue(Enterprise_PageCache_Model_Cookie::COOKIE_CUSTOMER_LOGGED_IN, '')
            . '_'
            . $this->_getCookieValue(Enterprise_PageCache_Model_Cookie::PERSISTENT_COOKIE_NAME, '');
        return $cacheId;
    }


    /**
     * Note:
     * Setting $lifetime = 5 because apparently
     * cache_lifetime in cache.xml is ignored?
     */
    protected function _saveCache($data, $id, $tags = array(), $lifetime = 5)
    {
        parent::_saveCache($data, $id, $tags, $lifetime);
    }

}
