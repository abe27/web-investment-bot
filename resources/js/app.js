require('./bootstrap')

import React from 'react'
import { ChakraProvider } from '@chakra-ui/react'
import { render } from 'react-dom'
import { createInertiaApp } from '@inertiajs/inertia-react'
import { InertiaProgress } from '@inertiajs/progress'

const appName =
  window.document.getElementsByTagName('title')[0]?.innerText || 'Bot Crypto'

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) => require(`./Pages/${name}`),
  setup({ el, App, props }) {
    return render(
      <ChakraProvider>
        <App {...props} />
      </ChakraProvider>,
      el,
    )
  },
})

InertiaProgress.init({ color: '#B20707' })
