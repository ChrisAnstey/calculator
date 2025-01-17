<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use App\Dto\CalculationRequest;
use App\Enum\Operation;
use App\Form\CalculationRequestType;
use App\Service\CalculationService;

class IndexController extends AbstractController
{
    private CalculationService $calculationService;

    public function __construct(CalculationService $calculationService)
    {
        $this->calculationService = $calculationService;
    }

    #[Route('/')]
    public function index(Request $request): Response
    {
        $calculationRequest = new CalculationRequest(0, 0, Operation::ADD->value);
        $form = $this->createForm(CalculationRequestType::class, $calculationRequest);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $result = $this->calculationService->calculate($calculationRequest);
        }

        return $this->render('index.html.twig', [
            'form' => $form->createView(),
            'result' => $result ?? null,
        ]);
    }
}
