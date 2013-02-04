<?php
/**
* SBND F&CMS - Framework & CMS for PHP developers
*
* Copyright (C) 1999 - 2013, SBND Technologies Ltd, Sofia, info@sbnd.net, http://sbnd.net
*
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
*
* @author SBND Techologies Ltd <info@sbnd.net>
* @package plugins.flashplayer
* @version 7.0.4
*/

BASIC::init()->imported('media.mod', 'cms/basic');
/**
 * Media plugin for play a flash videos. 
 * 
 * @author Evgeni Baldzhiyski
 * @version 0.1
 * @since 09.10.2012
 */
class FlashVideo2MediaPlugin extends FlashVideoMediaPlugin {
	/**
	 * Prepare function
	 * @access private
	 */
	protected function prepare(){
		parent::prepare();
		
		if(!isset($this->params['scale'])) $this->params['scale'] = 'noscale';	
		if(!isset($this->params['salign'])) $this->params['salign'] = 'tl';
			
		if(!isset($this->params['allowscriptaccess'])){
			$this->params['allowscriptaccess'] = 'true';
		}
		if(!isset($this->params['allowfullscreen'])){
			$this->params['allowfullscreen'] = 'true';
		}
		
		if($this->flashvars){
			$this->flashvars = str_replace("image=", "imagePath=", $this->flashvars);
			$this->flashvars = str_replace("file=", "videoPath=", $this->flashvars);
		}
			
		$this->params['src'] = BASIC::init()->ini_get('root_virtual').'plugins/flashplayer/swf/mediaplayer.swf';
	}
}
BASIC_MEDIA::addPlugin('flv',  new FlashVideo2MediaPlugin());
BASIC_MEDIA::addPlugin('mp4',  new FlashVideo2MediaPlugin());