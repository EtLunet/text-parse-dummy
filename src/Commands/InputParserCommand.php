<?php

namespace Commands;


use Parsers\TextParser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InputParserCommand extends Command {
    protected function configure() {
        $this
            ->setName('parse-input')
            ->setDescription('Parse the given input for certain features')
            ->addArgument('input_text', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $input = $input->getArgument('input_text');

        $todoListEntry = TextParser::parseInput($input);
        var_dump($todoListEntry);
    }
}
