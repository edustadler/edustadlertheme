    //Debug

    const canvas = document.querySelector('canvas.webgl2')
    //scene
    const scene = new THREE.Scene()

    //Objeto

    const geometria5 = new THREE.TorusGeometry(.7, .2, 32, 100);

  const geometria6 = new THREE.CylinderGeometry( .3, .3, .9, 64 );

  //Material

  const material5 = new THREE.MeshStandardMaterial({
    roughness: .4,
    metalness: .5
  })

  const material6 = new THREE.MeshStandardMaterial({
    roughness: .6,
    metalness: .2
  })

  material5.color = new THREE.Color(0x000000)
  material6.color = new THREE.Color(0x000000)


  //Mesh

  const planeta4 = new THREE.Mesh(geometria5, material5)
  planeta4.position.y = -.5
  planeta4.position.z = -3

  scene.add(planeta4)

  const planeta3 = new THREE.Mesh(geometria6, material6)
  planeta3.position.x = .5
  planeta3.position.y = .2

  scene.add(planeta3)



  //luzes

  const luz5 = new THREE.PointLight(0xFFE900, 4)
  luz5.position.x = 2
  luz5.position.y = 3
  luz5.position.z = 4

  scene.add(luz5)

  const luz6 = new THREE.PointLight(0xFFFFFF, 0.8)
  luz6.position.x = -8
  luz6.position.y = -3
  luz6.position.z = 4

  scene.add(luz6)

  const renderer = new THREE.WebGLRenderer({
    canvas: canvas,
    alpha: true,
    antialias: true
  })
  //sizes

  const sizes = {
    width: window.innerWidth,
    height: window.innerHeight
  }

  window.addEventListener('resize', () =>
  {
      // Update sizes
      sizes.width = window.innerWidth
      sizes.height = window.innerHeight

      // Update camera
      camera.aspect = sizes.width / sizes.height
      camera.updateProjectionMatrix()

      // Update renderer
      renderer.setSize(sizes.width, sizes.height)
      renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2))
  })

  //camera

  const camera = new THREE.PerspectiveCamera(90, sizes.width / sizes.height, 0.1, 50)
  camera.position.x = 0
  camera.position.y = 0
  camera.position.z = 2
  scene.add(camera)


  renderer.setSize(sizes.width, sizes.height)
  renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2))

  const clock1 = new THREE.Clock()

  const tick1 = () =>
  {

      const elapsedTime1 = clock1.getElapsedTime()

      // Update objects
    planeta4.rotation.y = .5 * elapsedTime1
    planeta3.rotation.z = .5 * elapsedTime1

      // Update Orbital Controls
      // controls.update()

      // Render
      renderer.render(scene, camera)

      // Call tick again on the next frame
      window.requestAnimationFrame(tick1)
  }

  tick1()