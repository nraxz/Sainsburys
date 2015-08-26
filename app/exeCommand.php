<?php
namespace App\Crawl;

use App\Crawl\Product;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class ExeCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('crawler')
            ->setDescription("This command crawls the Sainsburys link and write on JSon Format.");
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
       $Url='http://www.sainsburys.co.uk/webapp/wcs/stores/servlet/CategoryDisplay?listView=true&orderBy=FAVOURITES_FIRST&parent_category_rn=12518&top_category=12518&langId=44&beginIndex=0&pageSize=20&catalogId=10137&searchTerm=&categoryId=185749&listId=&storeId=10151&promotionId=#langId=44&storeId=10151&catalogId=10137&categoryId=185749&parent_category_rn=12518&top_category=12518&pageSize=20&orderBy=FAVOURITES_FIRST&searchTerm=&beginIndex=0&hideFilters=true';
       $xml=new Product($Url);
       $output->write(json_encode($xml->output()));


    }
}