var names = ['Matt Maribojoc', 'Lebron James', 'Bill Gates', 'Childish Gambino'] // used to generate posts for this tutorial

const getPosts = (number) => {
  // generate a number of posts
  // in a real setting, this would be a database call or algorithm

  let ret = []

  for (var i = 0; i < number; i++) {
    ret.push({
      author: names[i % names.length],
      content:
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.',
    })
  }

  return ret
}

export default getPosts
