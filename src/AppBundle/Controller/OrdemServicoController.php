<?php

namespace AppBundle\Controller;

use AppBundle\Entity\IOrdemServico;
use AppBundle\Entity\ValueObject\ParamDataTable;
use AppBundle\Form\OrdemServicoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\TranslatorInterface;

class OrdemServicoController extends Controller
{
    const OPERATION_SUCCESS = 'success';

    /** @var IOrdemServico $ordemServico */
    private $ordemServico;

    /** @var TranslatorInterface $translator */
    private $translator;

    const REMOVE = 'removida';
    const ADD = 'adicionada';
    const EDIT = 'actualizada';


    /**
     * OrdemServicoController constructor.
     * @param IOrdemServico $ordemServico
     * @param TranslatorInterface $translator
     */
    public function __construct(IOrdemServico $ordemServico, TranslatorInterface $translator)
    {
        $this->ordemServico = $ordemServico;
        $this->translator = $translator;
    }


    /**
     * @Route("/", name="homepage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('@App/OrdemServico/index.html.twig');
    }

    /**
     * @Route("/listOrdemServico", name="listOrdemServico")
     * @param Request $request
     * @return JsonResponse
     */
    public function loadDataAction(Request $request)
    {
        return $this->ordemServico->findAllForDataTable(new ParamDataTable($request));
    }

    /**
     * @Route("/manage/{id}", name="manage", defaults={"id":null})
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function addEdit(Request $request, $id)
    {
        $ordemServico = $this->ordemServico->CreateEntity($id);
        $form = $this->createForm(OrdemServicoType::class, $ordemServico);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->ordemServico->saveObject($ordemServico);
            $msg = $this->translator->trans('app.operations.success', [
                'OPERATION' => ($id) ? self::EDIT : self::ADD]);
            $this->addFlash(self::OPERATION_SUCCESS, $msg);
            return $this->redirectToRoute('homepage');
        }
        return $this->render('@App/OrdemServico/manage.html.twig', array(
            'form' => $form->createView(),
            'id' => $id
        ));
    }

    /**
     * Eliminar unaa Ordemsrvicom
     * @Route("/delete/{id}", name="delete", defaults={"id":null})
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function removeItemAction($id)
    {
        $response = $this->ordemServico->removeObject($id);
        if ($response) {
            $msg = $this->translator->trans('app.operations.success', ['OPERATION' => self::REMOVE]);
            $this->addFlash(self::OPERATION_SUCCESS, $msg);
        } else {
            $msg = $this->translator->trans('app.operations.error', ['OPERATION' => self::REMOVE]);
            $this->addFlash(self::OPERATION_SUCCESS, $msg);
        }
        return $this->redirectToRoute('homepage');
    }
}
