<?php

namespace Src\Core;

/**
 * Controller core class
 */
class Controller
{
  /**
   * Mengambil view
   * Lokasi file relatif terhadap folder /views/*
   * 
   * @param string $view
   * @param array $data
   * 
   * @return void
   */
  protected function view(string $view, array $data = []): mixed
  {
    return view(view: $view, data: $data);
  }

  /**
   * Mengambil view layout
   * Lokasi file layouts relatif terhadap folder /views/layouts/*
   * 
   * @param string $layout
   * @param string $content
   * @param array $data
   * 
   * @return void
   */
  protected function layout(string $layout, string $content, array $data): mixed
  {
    return layout(
      view: $layout,
      content: $content,
      data: $data,
    );
  }
}
