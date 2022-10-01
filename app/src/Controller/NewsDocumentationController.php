<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsDocumentationController extends AbstractController
{
    private $news_documentation = [
        [
            'id' => 'n1',
            'title' => 'Tytuł wiadomości 1',
            'content' => 'Donec nec eros sit amet urna ullamcorper porta. Integer ut odio rhoncus, tincidunt eros in, pellentesque risus. Proin a egestas urna, at laoreet dui. Nullam justo nunc, pulvinar ut tellus sed, suscipit molestie ipsum. Ut semper odio non porta suscipit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis dictum diam nec enim blandit, ut dictum lacus vulputate. Nam diam ligula, malesuada sed dolor ut, tempus interdum odio. Suspendisse potenti. Nullam lacinia nibh diam, sit amet ornare urna venenatis ac. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed vulputate tristique ultrices. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam molestie lectus scelerisque arcu pharetra, sed dapibus quam porta. Nulla condimentum id orci a suscipit.',
            'vote' => 0
        ],
        [
            'id' => 'n2',
            'title' => 'Tytuł wiadomości 2',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam interdum dui et mauris sodales, sit amet mattis odio aliquam. Donec iaculis efficitur dui vitae placerat. Phasellus vitae lacus auctor, tristique ex et, sodales ipsum. Donec sed sagittis felis, a auctor urna. Nulla ultrices dictum felis eu viverra. Pellentesque rutrum sapien quis vulputate fringilla. Morbi id feugiat urna, id consequat neque. Aenean id semper dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In ut leo turpis. Donec porta, ligula sit amet gravida interdum, elit dolor sollicitudin magna, sit amet consequat enim mi quis velit. Suspendisse condimentum nunc nibh, vel vestibulum nunc finibus at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.',
            'vote' => 0
        ],
        [
            'id' => 'n3',
            'title' => 'Tytuł wiadomości 3',
            'content' => 'Vestibulum finibus lorem in ex vehicula, quis efficitur mauris feugiat. In venenatis nisl sollicitudin nisi bibendum vestibulum. Sed magna mi, sollicitudin fringilla erat quis, hendrerit gravida mi. Vivamus mauris massa, venenatis quis elit et, egestas porta augue. Integer rhoncus nisi pharetra pretium aliquam. Nunc eu porta urna. Praesent eleifend laoreet malesuada. Morbi vitae lorem mi. Maecenas sed tempus nulla.',
            'vote' => 0
        ],
        [
            'id' => 'n4',
            'title' => 'Tytuł wiadomości n',
            'content' => 'Treść kolejnej wiadomości do ludu.',
            'vote' => 0
        ]
    ];
    private $comments = [
        [
            'id' => 'c1',
            'author' => 'Jola',
            'content' => 'Nie ma nikogo, kto lubiłby ból dla samego bólu, szukał go tylko po to, by go poczuć, po prostu dlatego, że to ból...',
            'voteUp' => 2,
            'voteDown'=> 0
        ],
        [
            'id' => 'c2',
            'author' => 'Ewelina',
            'content' => 'Sed a enim quis quam placerat bibendum eu consequat lacus. Cras at est arcu. Cras.',
            'voteUp' => 1,
            'voteDown'=> 3
        ],
        [
            'id' => 'c3',
            'author' => 'Rafał',
            'content' => 'Aliquam vitae metus malesuada, porta orci et, condimentum dolor. Suspendisse sed risus elementum magna eleifend.',
            'voteUp' => 5,
            'voteDown'=> 2
        ],
    ];

    #[Route('news/list', name: 'app_news_list')]
    public function list(): Response
    {


        return $this->render('home/documentation_list.html.twig', [
            'newsList' => $this->news_documentation
        ]);
    }

    #[Route('news/show/{slug}', name: 'app_news_documentation')]
    public function show($slug): Response
    {

        foreach ($this->news_documentation as $index => $item) {
            if ($item['id'] == $slug) {
                return $this->render('newsDocumentation/documentation.html.twig', [
                    'news' => $item,
                    'comments' => $this->comments
                ]);
            }
        }

        throw $this->createNotFoundException('The page does not exist');

    }

    #[Route('/comments/{id}/vote/{derection<up|down>}', name : 'comment_vote', methods: ['POST'])]
    public function commentVote($id, $derection)
    {
        foreach ($this->comments as $index => $comment) {
            if ($comment['id'] == $id) {


                if ($derection === 'up') {
                    $currentVoteGoodCount = ++$comment['voteUp'];
                    $currentVoteBadCount = $comment['voteDown'];
                } else {
                    $currentVoteGoodCount = $comment['voteUp'];
                    $currentVoteBadCount= ++$comment['voteDown'];
                }

                return $this->json([
                    'votes' => [
                        'goodVote'=> $currentVoteGoodCount,
                        'badVote' => $currentVoteBadCount
                    ]
                ]);
            }
        }

        throw $this->createNotFoundException('The page does not exist');

    }
}