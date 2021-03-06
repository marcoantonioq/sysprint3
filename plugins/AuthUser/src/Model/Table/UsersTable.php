<?php
namespace AuthUser\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        // $this->hasMany('Jobs', [
        //     'foreignKey' => 'user_id',
        //     'className' => 'Users.Jobs'
        // ]);
        // $this->belongsToMany('Prints', [
        //     'foreignKey' => 'user_id',
        //     'targetForeignKey' => 'printer_id',
        //     'joinTable' => 'users_printers',
        //     'className' => 'Users.Prints'
        // ]);

         
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->allowEmpty('rule')
            ->requirePresence('rule', 'create')
            ->add('rule', 'inList', [
                'rule' => ['inList', ['admin', 'user']],
                'message' => 'Por favor informe uma função válida'
            ]);

        $validator
            ->allowEmpty('email');
            // ->email('email');
            // ->requirePresence('email', 'create')
            // ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('adress');

        $validator
            ->allowEmpty('thumbnailphoto');

        $validator
            ->allowEmpty('status');

        return $validator;
    }

    public function beforeSave($options = array()) {
        // pr($options); exit;
    }
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        // $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
