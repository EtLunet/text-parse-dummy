<?php

namespace Commands;

use Services\Parser;
use Services\ParseType\DateType;
use Services\ParseType\PriorityType;
use Services\ParseType\TagType;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InputParserCommand extends Command
{


	protected function configure()
    {
        $this
            ->setName('parse-input')
            ->setDescription('Parse the given input for certain features')
            ->addArgument('input_text', InputArgument::REQUIRED)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $input = $input->getArgument('input_text');

		$parser = new Parser();
		$parser->addType(new DateType());
		$parser->addType(new PriorityType());
		$parser->addType(new TagType());

		$result = $parser->parse($input);

	    $output->writeln(json_encode($result, JSON_UNESCAPED_UNICODE));
    }


}
