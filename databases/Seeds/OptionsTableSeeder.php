<?php

namespace ConfrariaWeb\Option\Databases\Seeds;

use ConfrariaWeb\Option\Models\OptionGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->truncateOptionsTables();
        $optionsGroups = $this->options();
        foreach ($optionsGroups as $optionGroupKey => $optionGroup) {
            $group = OptionGroup::create(['name' => $optionGroupKey]);
            $this->command->info('Grupo de opção ' . $optionGroupKey . ' criada.');
            foreach ($optionGroup as $option) {
                $group->options()->create($option);
                $this->command->info('Opção ' . $option['name'] . ' criada.');
            }
        }
        Schema::enableForeignKeyConstraints();
    }

    private function truncateOptionsTables()
    {
        $this->command->info('Fazendo um truncate nas tabelas de options, sai da frente... ;/');
        DB::table('options')->truncate();
        DB::table('option_groups')->truncate();
        $this->command->info('Pronto, truncates de options feitos, acho que com sucesso :D');
    }

    private function options()
    {
        return [
            'settings' => [
                [
                    'name' => 'email_notification',
                    'label' => 'Notificação por e-mail?',
                    'type' => 'checkbox',
                    'placeholder' => 'Notificação por e-mail',
                    'value' => null,
                    'required' => false
                ],
                [
                    'name' => 'whatsapp_notification',
                    'label' => 'Notificação por WhatsApp?',
                    'type' => 'checkbox',
                    'placeholder' => 'Notificação por WhatsApp',
                    'value' => null,
                    'required' => false
                ],
                [
                    'label' => 'Quantidade de sites',
                    'name' => 'amount_sites',
                    'type' => 'number',
                    'placeholder' => 'Quantidade de sites',
                    'value' => NULL,
                    'required' => false
                ],
                [
                    'label' => 'Storage',
                    'name' => 'storage',
                    'type' => 'text',
                    'placeholder' => 'Storage',
                    'value' => NULL,
                    'required' => false
                ]
            ],
            'address' => [
                [
                    'label' => 'Estado',
                    'name' => 'state',
                    'type' => 'text',
                    'placeholder' => 'Estado',
                    'value' => NULL,
                    'required' => false
                ],
                [
                    'label' => 'Cidade',
                    'name' => 'city',
                    'type' => 'text',
                    'placeholder' => 'Cidade',
                    'value' => NULL,
                    'required' => false
                ],
            ]
        ];
    }
}
