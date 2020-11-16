<?php

namespace App\Command;

use App\Handler\ListHandler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

final class TestCommand extends Command
{
    private TranslatorInterface $translator;
    private ListHandler $listing;
    private string $name;

    public function __construct(
        ParameterBagInterface $parameters,
        TranslatorInterface $translator,
        ListHandler $listing
    ) {
        $this->translator = $translator;
        $this->listing = $listing;
        $this->name = $parameters->get('username');

        parent::__construct('app:test');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $liste = $this->listing->list();

        if (empty($liste)) {
            $io->error($this->translator->trans('empty_list'));
            return Command::FAILURE;
        }

        $io->table(array_keys($liste[0]), $liste);

        $io->success($this->translator->trans('welcome', ['name' => $this->name]));

        return Command::SUCCESS;
    }
}
