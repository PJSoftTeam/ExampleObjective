<?php
    /*
        Copyright © 2018 PJSoft All Rights Reserved.
        
        This program is free software: you can redistribute it and/or modify
        it under the terms of the GNU General Public License as published by
        the Free Software Foundation, either version 3 of the License, or
        (at your option) any later version.
        
        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.
        
        You should have received a copy of the GNU General Public License
        along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */
    
    declare(strict_types=1);
    
    namespace PJSoft\ExampleObjective;
    
    use PJSoft\ExampleObjective\Events\TestListener1;
    use PJSoft\ExampleObjective\Tasks\TestTask1;
    use pocketmine\plugin\PluginBase;
    
    class Main extends PluginBase
    {
        
        public function onEnable(): void
        {
            $this->getLogger()->info("§l§e{$this->getDescription()->getName()}§rが読み込まれました！");
            
            $this->getServer()->getPluginManager()->registerEvents(new TestListener1($this), $this);
            
            $this->getScheduler()->scheduleDelayedRepeatingTask(new TestTask1($this), 20 * 10, 0);
        }
        
        public function onDisable(): void
        {
            $this->getLogger()->info("§l§e{$this->getDescription()->getName()}§rを終了しました！");
        }

    }