<?php

namespace App\Controller;

//use http\Client\Response
use App\Entity\Book;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class BookController extends AbstractController
{
    private BookRepository $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function __invoke(Request $request): array
    {
        $category = $request->query->get('category', 'All');
        if ($category === 'All')
        {
            return $this->bookRepository->findAll();
        }
        return $this->bookRepository->findByCategory($category);
    }
}
