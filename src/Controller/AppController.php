<?php
declare(strict_types=1);

namespace App\Controller;

use App\View\Helper\SweetFlashHelper;
use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Cake\Utility\Hash;

class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');

        $this->loadComponent('Auth', ['authenticate' => [
            'Form' => [
                'fields' => [
                    'username' => 'username',
                    'password' => 'password'
                    ]
                ]
            ]
        ]);        
    }
    
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        // Verifica se o usuário está autenticado
        $user = $this->Auth->user();
        if (!$user && $this->getRequest()->getParam('action') !== 'login') {
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function beforeRender(EventInterface $event)
    {
        $this->set('_serialize', true);
    }
    
}
